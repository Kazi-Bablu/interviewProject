<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::paginate('10');
        return view('category.view', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|unique:categories,category_name',
            'category_status' => 'required'
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->category_status = $request->category_status;
        $category->save();
        flash('Category added successfully')->important()->success();
        return redirect()->back();
    }

    /**
     * @param $id
     * @throws \Exception
     */
    public function delete($id)
    {
        $products = Product::where('category_id', $id)->get();
        if ($products) {
            foreach ($products as $product) {
                $product->delete();
            }
        }

        $categoryById = Category::find($id);
        if ($categoryById) {
            $categoryById->delete();
        }

        flash('Category delete successfully.')->important()->success();
        return back();
    }
}
