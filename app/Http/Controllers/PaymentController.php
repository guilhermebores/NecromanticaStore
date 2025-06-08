<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Exception\CardException;
use Exception;

class PaymentController extends Controller
{

    public function showPaymentForm()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $total = $cartItems->reduce(function ($carry, $item) {
            return $carry + ($item->product->price * $item->quantity);
        }, 0);

        return view('payment.payment', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Obter itens do carrinho
        $cartItems = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        // Calcular total
        $total = $cartItems->reduce(function ($carry, $item) {
            return $carry + ($item->product->price * $item->quantity);
        }, 0);

        if ($total <= 0) {
            return back()->with('error_message', 'Seu carrinho está vazio');
        }

        // Validação dos campos
        $request->validate([
            'name' => 'required|string',
            'card_number' => 'required|string',
            'card_expiry' => 'required|string',
            'card_cvc' => 'required|string',
            'address_line1' => 'required|string',
            'address_city' => 'required|string',
            'address_state' => 'required|string',
            'address_zip' => 'required|string',
            'address_country' => 'required|string',
        ]);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            $tokenId = 'tok_visa';

            $charge = \Stripe\Charge::create([
                'amount' => intval($total * 100),
                'currency' => 'brl',
                'source' => $tokenId,
                'description' => 'Compra na NecromanticaStore',
            ]);

            Cart::where('user_id', Auth::id())->delete();

            return redirect()->route('payment.success')
                ->with('successo', 'Pagamento de R$ ' . number_format($total, 2, ',', '.') . ' realizado com sucesso!');
            
        } catch (\Stripe\Exception\CardException $e) {
            return back()->with('error_message', 'Erro no cartão: ' . $e->getMessage());
        } catch (\Exception $e) {
            return back()->with('error_message', 'Erro no pagamento: ' . $e->getMessage());
        }
    }

    public function success(Request $request)
    {
        // Você pode acessar os dados da sessão se necessário
        $successMessage = session('successo', 'Pagamento realizado com sucesso!');
        
        return view('payment.success', [
            'message' => $successMessage
        ]);
    }
}