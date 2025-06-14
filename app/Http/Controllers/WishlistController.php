<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function addToWishlist($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Produto não encontrado!'], 404);
        }

        if (Wishlist::where('user_id', auth()->id())->where('product_id', $productId)->exists()) {
            return response()->json(['error' => 'Este produto já está na sua lista de desejos!'], 400);
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
        ]);

        return response()->json(['success' => 'Produto adicionado à lista de desejos!']);
    }

    public function removeFromWishlist($productId)
    {
        $wishlistItem = Wishlist::where('user_id', auth()->id())->where('product_id', $productId)->first();

        if (!$wishlistItem) {
            return response()->json(['error' => 'Produto não encontrado na sua lista de desejos!'], 404);
        }

        $wishlistItem->delete();

        return response()->json(['success' => 'Produto removido da lista de desejos!']);
    }

    public function showWishlist()
    {
        $wishlist = Wishlist::where('user_id', auth()->id())->with('product')->get();

        return response()->json(['wishlist' => $wishlist]);
    }
}
