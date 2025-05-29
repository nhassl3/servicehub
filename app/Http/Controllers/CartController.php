<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class CartController extends Controller
{
    public function index(Request $request)
    {
        return Wrapped::wrapped_callback($request, function ($user) use ($request) {
            $cart = $user->cart()->with('items.product')->first();

            if (!$cart) {
                $cart = $user->cart()->create();
            }

            $cart = $cart['items'];
            $countCartItems = $cart->count();
            $products = [];
            foreach ($cart as $item) {
                $products[$item['id']] = [
                    'quantity' => $item['quantity'],
                    'isLike' => (bool) $item['isLike'],
                    'isHit' => (bool) $item['isHit'],
                    'title' => $item['product']['title'],
                    'description' => $item['product']['description'],
                    'price' => $item['product']['price'],
                    'image_url' => $item['product']['image_url'],
                    'discount_price' => $item['product']['discount_price'],
                    'weight' => $item['product']['weight'],
                    'unity_weight' => $item['product']['unity_weight']
                ];
            }

            return view('shopping-cart', compact('products', 'countCartItems'));
        });
    }

    public function update(Request $request)
    {
        return Wrapped::wrapped_callback($request, function ($user) use ($request) {
            $credentials = $request->only("productId", "amount");
            $product = Product::findOrFail($credentials['productId']);
            $cart = $user->cart()->firstOrCreate();

            $cartItem = $cart->items()->where('product_id', $product->id)->first();

            if ($cartItem) {
                $cartItem->increment("quantity");
            } else {
                $cart->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $credentials['amount'] ?? 1
                ]);
            }
            Cache::forget("countCartItems:user:{$user->id}");
            return response()->json(['status' => 200, 'message' => 'Товар успешно добавлен в корзину']);
        }, "Не удалось добавить товар в корзину");
    }

    public function delete(Request $request)
    {
        return Wrapped::wrapped_callback($request, function ($user) use ($request) {
            $credentials = $request->only(['cart_item_id']);
            $user->cart()->with('items')->first()->items()->where('id', $credentials['cart_item_id'])->delete();
            Cache::forget("countCartItems:user:{$user->id}");
            return response()->json(['status' => Response::HTTP_OK, "message" => 'Товар успешно удалён из корзины']);
        }, 'Не удалось удалить товар из корзины');
    }

    public function countCartItems(Request $request)
    {
        return Wrapped::wrapped_callback($request, function ($user) {
            return response()->json([
                'status' => 200,
                'count' => $user->cart()->with('items.product')->first()->items()->count()
            ]);
        });
    }

    public function updateQuantity(Request $request)
    {
        return Wrapped::wrapped_callback($request, function ($user) use ($request) {
            $credentials = $request->only(['cart_item_id', 'quantity']);
            $user->cart()->with("items")->first()->items()->where('id', $credentials['cart_item_id'])->update(['quantity' => $credentials['quantity']]);
            return response()->json(['status' => Response::HTTP_OK]);
        });
    }

    public function updateLikeProduct(Request $request)
    {
        return Wrapped::wrapped_callback($request, function ($user) use ($request) {
            $credentials = $request->only(['cart_item_id', 'is_like']);
            $user->cart()->with('items')->first()->items()->where('id', $credentials['cart_item_id'])->update(['isLike' => $credentials['is_like']]);
            return response()->json(['status' => Response::HTTP_OK]);
        });
    }

    public function indexLikesPage(Request $request)
    {
        return Wrapped::wrapped_callback($request, function ($user) use ($request) {
            $likes = $user->cart()->where("isLike", true)->with('items')->first()->items()->get();
            return view('likes', compact("likes"));
        });
    }
}
