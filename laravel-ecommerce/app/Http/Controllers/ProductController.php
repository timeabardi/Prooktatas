<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    private $defaultCategoryName = 'Összes termék';
    private $defaultCategorySlug = 'osszes-termek';

    public function list($category = 'osszes-termek')
    {
        $activeCategoryName = $this->defaultCategoryName;
        $activeCategorySlug = $this->defaultCategorySlug;

        $productCategories = ProductCategory::whereHas('products', function($query) {
            $query->where('stock', '>', 0);
        })->get();

        $productCategories = $productCategories->map(function($productCategory) {
            return [
                'id' => $productCategory->id,
                'name' => $productCategory->name,
                'slug' => $productCategory->slug,
                'product_count' => $productCategory->products->where('stock', '>', 0)->count()
            ];
        });

        $productCategories = $productCategories->prepend([
            'id' => 0,
            'name' => $this->defaultCategoryName,
            'slug' => $this->defaultCategorySlug,
            'product_count' => Product::where('stock', '>', 0)->count()
        ]);
        
        $ActiveProductCategory = $productCategories->filter(function($productCategory) use ($category) {
            return $productCategory['slug'] == $category;
        })->first();

        if($ActiveProductCategory) {
            $activeCategoryName = $ActiveProductCategory['name'];
            $activeCategorySlug = $ActiveProductCategory['slug'];
        }

        if($activeCategoryName == $this->defaultCategoryName) {
            $products = Product::where('stock', '>', 0)
            ->orderBy('created_at', 'desc')
            ->get();
        }else{
            $products = Product::where('stock', '>', 0)
            ->where('product_category_id', $ActiveProductCategory['id'])
            ->orderBy('created_at', 'desc')
            ->get();
        }

        return view('product.list', [
            'page' => 'products',
            'products' => $products,
            'product_categories' => $productCategories,
            'active_category_name' => $activeCategoryName,
            'active_category_slug' => $activeCategorySlug
        ]);
    }
}