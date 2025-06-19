<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

public function index()
{
    // sau này có login thì lọc theo user_id
    $favorites = []; // sẽ là list sản phẩm đã thích
    return view('favorites.index', compact('favorites'));
}

class FavoriteController extends Controller
{
    //
}
