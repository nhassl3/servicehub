<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Arr;
use Exception;

class ProductController extends Controller
{
    public function card(Request $request)
    {
        try {
            $id = $request->input("productId");
            $product = Product::where('id', $id)->firstOrFail();
            return view("card", compact('product'));
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
    public function showCategory(Request $request, string $slug)
    {
        $offset = $request->input('offset', default: 12); // значение по умолчанию 12
        $page = $request->input('page', 1); // значение по умолчанию 1

        // Получаем категории из кэша
        $categories = Cache::get("market_categories");

        // Получаем категорию по slug
        $category = collect($categories)->get($slug) ?? abort(404);
        $category = Arr::only((array)$category, ['id']);

        // Получаем продукты этой категории (предполагая, что у вас есть связь между моделями)
        $productsQuery = Product::where('category_id', $category['id'])
            ->select(['id', 'title', 'discount_price', 'image_url']);

        $countProducts = Cache::remember(
            'count_products_' . $slug,
            3600,
            fn() => (clone $productsQuery)->count()
        );

        $products = $productsQuery
            ->offset(($page - 1) * $offset)
            ->limit($offset)
            ->get()
            ->toArray();

        // Возвращаем представление с данными
        return view('market', compact('slug', 'products', 'categories', 'countProducts', 'offset', 'page'));
    }

    public function index(Request $request)
    {
        $offset = $request->input('offset', default: 12); // значение по умолчанию 12
        $page = $request->input('page', 1); // значение по умолчанию 1

        // Cache values
        $categories = Cache::rememberForever('market_categories', function () {
            $categories = [
                'all' => ['name' => 'все продукты', "id" => 0],
            ];

            foreach (Category::all() as $category) {
                $categories[$category->slug] = ['name' => $category->name, 'id' => $category->id];
            }

            return $categories;
        });

        $productsQuery = Product::select(['id', 'title', 'discount_price', 'image_url']);

        $countProducts = Cache::remember(
            'count_products',
            3600,
            fn() => (clone $productsQuery)->count()
        );

        $products = $productsQuery
            ->offset(($page - 1) * $offset)
            ->limit($offset)
            ->get()
            ->toArray();

        return view("market", compact("products", "categories", "countProducts", "offset", 'page'));
    }
}
