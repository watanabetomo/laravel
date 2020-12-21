<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\ProductCategory;
use App\ProductDetail;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $product = new Product;
            $products = $product->all();
            return view('product_list', compact('products'));
        } catch (PDOException $e) {
            $error = 'データベースに接続できませんでした。';
            return view('product_list', compact('error'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $productCategory = new ProductCategory;
            $productCategories = $productCategory->all();
            return view('product_edit', compact('productCategories'));
        } catch (PDOException $e) {
            $error = 'データベースに接続できませんでした。';
            return view('product_edit', compact('error'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->all();
            $product = new Product;
            $id = $product->insertGetId([
                'name' => $input['name'],
                'product_category_id' => $input['product_category_id'],
                'delivery_info' => $input['delivery_info'],
                'turn' => $input['turn'],
                'create_user' => Auth::user()->id,
            ]);
            $productDetail = new ProductDetail;
            for ($i = 0; $i > 5; $i++){
                $productDetail->create([
                    'product_id' => $id,
                    'size' => $input['details'][$i]['size'],
                    'price' => $input['details'][$i]['price'],
                    'turn' => $i
                ]);
            }
            DB::commit();
            return view('product_done');
        } catch (PDOException $e) {
            DB::rollBack();
            $error = 'データベースに接続できませんでした。';
            return view('product_done', compact('error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $product = new Product;
            $productData = $product::where('id', $id)->first();
            $productCategory = new ProductCategory;
            $productCategories = $productCategory->all();
            $productDetail = new ProductDetail;
            $productData['details'] = $productDetail->where('product_id', $id)->get();
            return view('product_edit', compact('productData', 'productCategories'));
        } catch (PDOException $e) {
            $error = 'データベースに接続できませんでした。';
            return view('product_edit', compact('error'));
        }

    }

    public function conf(Request $request, $id)
    {
        $input = $request->all();
        $productCategory = new ProductCategory;
        $category = $productCategory::where('id', $input['category_id'])->first()->name;
        return view('product_conf', compact('input', 'category', 'id'));
    }

    public function fix(Request $request, $id)
    {
        try {
            $productData = $request->all();
            $productCategory = new ProductCategory;
            $productCategories = $productCategory->all();
            return view('product_edit', compact('productData', 'productCategories'));
        } catch (PDOException $e) {
            $error = 'データベースに接続できませんでした。';
            return view('product_edit', compact('error'));
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = new Product;
            $products = $product::where('id', $id)->first();
            $products->delete_flg = true;
            $products->save();
            $products = $product->all();
            return view('product_list', compact('products'));
        } catch (PDOException $e) {
            $error = 'データベースに接続できませんでした。';
            return view('product_list', compact('error'));
        }

    }

    public function search(Request $request)
    {
        try {
            $product = new Product;
            if ($request->input('keyword') == '' or $request->input('all')) {
                $products = $product->all();
                return view('product_list', compact('products'));
            }
            $products = $product::where('name', 'like', '%' . $request->input('keyword') . '%')->get();
            return view('product_list', compact('products'));
        } catch (PDOException $e) {
            $error = 'データベースに接続できませんでした。';
            return view('product_list', compact('error'));
        }
    }

    public function sort(Request $request, $column)
    {
        try {
            $product = new Product;
            $products = $product->orderBy($column, $request->input('order'))->get();
            return view('product_list', compact('products'));
        } catch (PDOException $e) {
            $error = 'データベースに接続できませんでした。';
            return view('product_list', compact('error'));
        }
    }
}
