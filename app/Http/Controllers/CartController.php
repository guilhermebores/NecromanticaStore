<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
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

        return view('cart.index', compact('cartItems', 'total'));
    }



    public function add(Request $request, $productId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $product = Product::findOrFail($productId);
        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Produto adicionado ao carrinho com sucesso!');
    }


    public function remove($productId)
    {
        Cart::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->delete();

        return redirect()->route('cart.index')->with('success', 'Produto removido do carrinho!');
    }

    public function clear()
    {
        Cart::where('user_id', Auth::id())->delete();

        return redirect()->route('cart.index')->with('successo', 'Carrinho limpo');
    }
}
