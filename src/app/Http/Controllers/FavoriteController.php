<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        // sau này có login thì lọc theo user_id
        $favorites = []; // sẽ là list sản phẩm đã thích
        return view('favorites.index', compact('favorites'));
    }
}
