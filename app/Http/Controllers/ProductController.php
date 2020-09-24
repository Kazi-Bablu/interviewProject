<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::join('categories', 'categories.id', 'products.category_id')
            ->select(
                'products.id',
                'products.product_quantity',
                'products.product_name',
                'products.product_price',
                'products.sku_id',
                'categories.category_name'
            )->paginate('10');
        return view('product.view', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'product_name' => 'required|unique:products,product_name',
            'product_quantity' => 'required',
            'product_price' => 'required'
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->sku_id = random_int(100, 10000);
        $product->product_name = $request->product_name;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->save();

        flash('Product added successfully')->important()->success();
        return redirect()->back();
    }


}
