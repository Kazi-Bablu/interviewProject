<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use App\ProductService;
use App\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
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
    public function create()
    {
        $customers = Customer::all();
        $categories = Category::all();
        $proposals = Proposal::join('categories', 'categories.id', 'proposals.category_id')
            ->join('products', 'products.category_id', 'categories.id')
            ->where('proposals.proposal_status', 'Pending')
            ->select(
                'proposals.id as proposal_id',
                'products.id as product_id',
                'products.product_name',
                'products.product_price'
            )->get();

        return view('proposal.create', compact('customers', 'categories', 'proposals'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'customer_id' => 'required',
            'issue_date' => 'required',
            'category_id' => 'required',
            'proposal_number' => 'required|unique:proposals,proposal_number'
        ]);

        $proposal = new Proposal();
        $proposal->customer_id = $request->customer_id;
        $proposal->issue_date = date('Y-m-d', strtotime($request->issue_date));
        $proposal->category_id = $request->category_id;
        $proposal->proposal_number = $request->proposal_number;
        $proposal->proposal_status = "Pending";
        $proposal->save();

        flash('Proposal added successfully')->important()->success();
        return redirect()->back();

    }

//    public function index()
//    {
////        $proposals = Proposal::join('categories', 'categories.id', 'proposals.category_id')
////            ->join('products', 'products.category_id', 'categories.id')
////            ->where('proposals.proposal_status', 'Pending')
////            ->select(
////                'proposals.id as proposal_id',
////                'products.id as product_id',
////                'products.product_name'
////            )->get();
//
//        return view('proposal.create', compact('proposals'));
//    }
    /**
     * @param Request $request
     */
    public function productServiceStore(Request $request)
    {
        foreach ($request->proposal_id as $i => $proposalId) {
            $productService = new ProductService();
            $productService->proposal_id = $request->proposal_id[$i];
            $productService->product_id = $request->product_id[$i];
            $productService->product_quantity = $request->product_quantity[$i];
            $productService->product_price = $request->product_price[$i];
            $productService->product_discount = $request->product_discount[$i];
            $productService->amount = $request->amount[$i];
            $productService->description = $request->description[$i];
            $productService->sub_total = $request->sub_total[$i];
            $productService->final_discount = $request->final_discount[$i];
            $productService->final_amount_after_discount = $request->final_amount_after_discount[$i];
            $productService->save();
        }


        flash('Product service added successfully')->important()->success();
        return redirect()->back();
    }
}
