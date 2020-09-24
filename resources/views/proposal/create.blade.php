@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Customer Add</div>
                    <div class="panel-body">
                        <form method="post" action="{{url('proposal/create')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-md-3">

                                <div class="form-group {{$errors->has('customer_id')?'has-error':''}}">
                                    <label>Customer Name</label>
                                    <select name="customer_id"
                                            class="form-control selectpicker"
                                            data-live-search="true"
                                            title="Select an Customer">
                                        @foreach($customers as $customer)
                                            <option value="{{$customer->id}}">{{$customer->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block">{{$errors->first('customer_id')}}</p>
                                </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{$errors->has('issue_date')?'has-error':''}}">
                                    <label>Issue Date</label>
                                    <input type="date" name="issue_date" class="form-control"
                                           value="{{old('issue_date')}}"/>
                                    <p class="help-block">{{$errors->first('issue_date')}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{$errors->has('category_id')?'has-error':''}}">
                                    <label for=""> Category Name</label>
                                    <select name="category_id"
                                            class="form-control selectpicker"
                                            data-live-search="true"
                                            title="Select an Category">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach

                                    </select>
                                    <p class="help-block">{{$errors->first('category_id')}}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{$errors->has('proposal_number')?'has-error':''}}">
                                    <label>Proposal Number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-file-text"
                                                                          aria-hidden="true"></i></div>
                                        <input type="text" name="proposal_number" class="form-control"
                                               value="{{old('proposal_number')}}"/>
                                    </div>

                                    <p class="help-block">{{$errors->first('proposal_number')}}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="reset" class="btn btn-warning pull-left" value="Reset"/>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"
                                                                                            aria-hidden="true"></i> Add
                                    Item
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Product & Service</div>
                    <div class="panel-body">
                        <form method="post" action="{{url('product/service/create')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{--                            @for($i=0; $i<count($proposals); $i++)--}}
                            @foreach($proposals as $proposal)
                                <input type="hidden" name="proposal_id[]" value="{{$proposal->proposal_id}}"/>
                                <div class="col-md-4">

                                    <div class="form-group {{$errors->has('product_id')?'has-error':''}}">
                                        <label>Product Name</label>
                                        <select name="product_id[]"
                                                class="form-control selectpicker"
                                                data-live-search="true"
                                                title="Select an product">
                                            {{--                                            @foreach($proposals as $proposal)--}}
                                            {{--                                                <option value="{{$proposal->product_id}}">{{$proposal->product_name}}</option>--}}
                                            {{--                                            @endforeach--}}
                                            <option value="{{$proposal->product_id}}">{{$proposal->product_name}}</option>

                                        </select>
                                        <p class="help-block">{{$errors->first('product_id')}}</p>
                                    </div>

                                </div>
                                <div class="col-md-2">
                                    <div class="form-group {{$errors->has('product_quantity')?'has-error':''}}">
                                        <label>Product Quantity</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="fa fa-sort-numeric-asc"
                                                                              aria-hidden="true"></i></div>
                                            <input onkeyup="calculate()" type="number" name="product_quantity[]"
                                                   class="form-control"
                                                   min="0.00" value="{{old('product_quantity')}}"/>
                                        </div>

                                        <p class="help-block">{{$errors->first('proposal_number')}}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group {{$errors->has('product_price')?'has-error':''}}">
                                        <label>Product Price</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">$</div>
                                            <input type="number" name="product_price[]" class="form-control"
                                                   value="{{$proposal->product_price}}"/>
                                        </div>

                                        <p class="help-block">{{$errors->first('product_price')}}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group {{$errors->has('product_discount')?'has-error':''}}">
                                        <label>Product Discount</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">%</div>
                                            <input type="number" onkeyup="calculate()" name="product_discount[]"
                                                   class="form-control"
                                                   min="0.00" value="{{old('product_discount')}}"/>
                                        </div>

                                        <p class="help-block">{{$errors->first('product_discount')}}</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group {{$errors->has('amount')?'has-error':''}}">
                                        <label>Amount</label>
                                        <div class="input-group">
                                            <input type="number" readonly name="amount[]" class="form-control"
                                                   value="{{old('amount ')}}"/>
                                        </div>

                                        <p class="help-block">{{$errors->first('amount')}}</p>
                                    </div>
                                </div>
                            @endforeach
                            {{--                            @endfor--}}
                            <div class="col-md-5 pull-left">
                                <div class="form-group {{$errors->has('description')?'has-error':''}}">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control"
                                              rows="3">{{old('description')}}</textarea>
                                    <p class="help-block">{{$errors->first('description')}}</p>
                                </div>
                            </div>
                            <div class="col-lg-5 pull-right table-responsive">
                                <table class="table">
                                    <tbody>

                                    <tr>
                                        <td>Sub Total($)</td>
                                        <br>
                                        <td><input type="number" onkeyup="finalCalculate()" class="form-control"
                                                   name="sub_total[]"/></td>
                                    </tr>
                                    <tr>
                                        <td>Discount($)</td>
                                        <br>
                                        <td><input type="number" onkeyup="finalCalculate()" class="form-control"
                                                   name="final_discount[]"/></td>
                                    </tr>
                                    <tr>
                                        <td>Total Amount($)</td>
                                        <br>
                                        <td><input type="text" readonly class="form-control"
                                                   name="final_amount_after_discount[]"/></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                <input type="reset" class="btn btn-warning pull-left" value="Reset"/>
                                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"
                                                                                            aria-hidden="true"></i>
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        function calculate() {
            let quantity = parseFloat($('input[name="product_quantity[]"]').val());
            let price = parseFloat($('input[name="product_price[]"]').val());
            let discount = parseFloat($('input[name="product_discount[]"]').val());

            let amount_after_discount= discount * price / 100;
            //console.log(amount_after_discount);

            let sum =quantity * price - amount_after_discount * quantity;
            console.log(sum);

            $('input[name="amount[]"]').val(sum);
            $('input[name="sub_total[]"]').val(sum);

        }

        function finalCalculate() {
            let sub_total_amount = parseFloat($('input[name="sub_total[]"]').val());
            let discount_amount = parseFloat($('input[name="final_discount[]"]').val());

            let final_discount_amount = sub_total_amount * discount_amount / 100

            let sum = sub_total_amount - final_discount_amount;
          //  console.log(sum);

            $('input[name="final_amount_after_discount[]"]').val(sum);
        }

    </script>
@endsection