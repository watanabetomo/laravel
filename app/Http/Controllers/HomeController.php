<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;
use App\ProductDetail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showList()
    {
        try {
            $productCategories = ProductCategory::all();
            $productList = [];
            foreach ($productCategories as $category) {
                $productData = [];
                $products = Product::where('product_category_id', $category['id'])->get();
                foreach ($products as $item) {
                    $productDetails = ProductDetail::where('product_id', $item['id'])->get();
                    $productData[] = [
                        'data' => $item,
                        'detail' => $productDetails
                    ];
                }
                $productList[] = [
                    'id' => $category['id'],
                    'name' => $category['name'],
                    'product' => $productData
                ];
            }
            return view('index', compact('productList'));
        } catch (PDOException $e) {
            $error = 'データベースに接続できませんでした。';
            return view('index', compact('error'));
        }
    }
}
