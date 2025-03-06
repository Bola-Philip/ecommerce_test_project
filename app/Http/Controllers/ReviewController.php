<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request): RedirectResponse
    {
        $user = User::first();
        $data = $request->validated();
        $data += ['user_id' => $user['id']];          //replace with the login user auth()->id()

        Review::query($data)->updateOrCreate([
            'user_id' => $user['id'],
            'product_id' => $data['product_id']
        ],$data);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
}
