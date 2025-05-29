<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewsController extends Controller
{
    public function index(Request $request)
    {
        $reviews = Reviews::with('product:id,title,image_url,discount_price')
            ->select('id', 'product_id', 'rating', 'comment')
            ->get()
            ->mapWithKeys(function ($review) {
                return [
                    $review->product_id => [
                        'rating' => $review->rating,
                        'comment' => $review->comment,
                        'title' => $review->product->title,
                        'image_url' => $review->product->image_url,
                    ]
                ];
            });

        return view('reviews', compact('reviews'));
    }

    public static function indexMainPage()
    {
        $reviews = Reviews::where('rating', '>', 4)
            ->with('product:id,title,image_url,discount_price')
            ->select('id', 'product_id', 'rating', 'comment')
            ->inRandomOrder()
            ->take(3)
            ->get()
            ->mapWithKeys(function ($review) {
                return [
                    $review->product_id => [
                        'title' => $review->product->title,
                        'image_url' => $review->product->image_url,
                        'discount_price' => $review->product->discount_price
                    ]
                ];
            });

        return $reviews;
    }

    public function userReviewsIndex(Request $request)
    {
        return Wrapped::wrapped_callback($request, function ($user) {
            $reviews = $user->reviews()->with('product')->all();
            return view('user-reviews', compact('reviews'));
        });
    }
}
