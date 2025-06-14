<?php

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'total' => 'required|numeric|min:0.01',
            'stripeToken' => 'required|string',
        ]);

        $valorEmCentavos = intval($request->input('total') * 100);

        try {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            $charge = \Stripe\Charge::create([
                'amount' => $valorEmCentavos,
                'currency' => 'brl',
                'source' => $request->stripeToken,
                'description' => 'Compra no NecromanticaStore',
            ]);

            // Salvar a transação no banco
            Transaction::create([
                'user_id' => Auth::id(),
                'payment_id' => $charge->id,
                'amount' => $charge->amount,
                'currency' => $charge->currency,
            ]);

            $user = Auth::user();
            if ($user) {
                $user->notify(new \App\Notifications\PurchaseSuccess());
            }

            return redirect()->route('cart.index')->with('successo', 'Pagamento realizado com sucesso!');
        } catch (\Exception $e) {
            return back()->with('error_message', 'Falha no pagamento: ' . $e->getMessage());
        }
    }
}
