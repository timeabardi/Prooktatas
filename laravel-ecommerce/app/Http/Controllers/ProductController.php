<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function list() {
        $products = Product::where('stock', '>', 0)->get();
        //dd(\DB::getQueryLog());
        //echo '<pre>'; print_r($products); echo '</pre>'; exit;
        //dd($products);
        return view('product.list', [
            'products' => $products
        ]);
    }
}
