@extends('theme.master')
@section('title')
   Giỏ Hàng
@endsection
@section('content')
    <div class="container">
        <div class="shoes-grid"> 
            <div class="products">
                <h5 class="latest-product">LATEST PRODUCTS</h5>
            </div>
            <div class="product">      
                <form action="" method="post">
                	{{csrf_field()}}
                	<table class="table custom-table">
                		<tr>
                			<th>Xóa</th>
                			<th>image</th>
                			<th>Tên sp</th>
                			<th>Số Lượng</th>
                			<th>Sale</th>
                			<th>Price</th>
                			<th>Tổng Tiền</th>
                			<th>Thanh Toán</th>
                		</tr>
                		@foreach($content as $key => $nd)
	                		<tr>
	                			<td class="text-center"><a class="btn-remove" href="{{url('delete-card')}}/{{$nd->rowId}}"><span class="fa fa-trash-o">Xóa</span></a></td>
	                			<td><img src=""><img src="{{asset('upload/images/product')}}/{{$nd->options->img}}" width="100px"></td>
	                			<td><img src="">{{$nd->name}}</td>
	                			<td><img src="">{{$nd->qty}}</td>
	                			<td><img src="">{{$nd->options->sale}}</td>
	                			<td><img src="">{{$nd->options->priceold}}</td>
	                			<td><img src="">{{number_format($nd->options->priceold*$nd->qty)}}</td>
	                			<td><img src="">{{number_format($nd->price*$nd->qty) }}</td>
	                		</tr>
                		@endforeach
                	</table>
                	<div class="col-md-4">
                		<div class="text-right">
		                    <a href="{{asset('/')}}" class="btn btn-default btn-md">CONTINUE SHOPPING</a>		                    
		                </div>
                	</div>
                	<div class="col-md-8">
                		<div class="text-right">
           				 <p>Tông tiền Thanh toán:  {{$total}}</p>
           				 </div>             
       				 </div>

       				 <div class="row">
                    <div class="col-sm-12">
                        <h4>Customer Info</h4>
                        <p class="text-muted">Enter your destination to get shipping</p>
                        <div class="form-group">
                            <label class="control-label">Name <em>*</em></label>
                            <input type="text" class="form-control" name="name">
                            @if($errors->has('name'))
                                <p style="color: red"> {{$errors->first('name')}} </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email <em>*</em></label>
                            <input type="email" class="form-control" name="email">
                            @if($errors->has('email'))
                                <p style="color: red"> {{$errors->first('email')}} </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone <em>*</em></label>
                            <input type="number" class="form-control" name="phone">
                            @if($errors->has('phone'))
                                <p style="color: red"> {{$errors->first('phone')}} </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <input type="text" class="form-control" name="address">
                            @if($errors->has('address'))
                                <p style="color: red"> {{$errors->first('address')}} </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gender</label><br>
                            <input type="radio"  name="gender"  value="1"> Male<br>
                            <input type="radio"  name="gender" value="0"> Female
                            @if($errors->has('gender'))
                                <p style="color: red"> {{$errors->first('gender')}} </p>
                            @endif
                        </div>
                   
                        <div class="form-group">
                            <label class="control-label">Choose Shipping</label><br>
                            <input type="radio"  name="payment"  value="1"> Direct payment<br>
                            <input type="radio"  name="payment" value="0"> Payment via card
                            @if($errors->has('payment'))
                                <p style="color: red"> {{$errors->first('payment')}} </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row col-sm-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-md">Agree to Order</button>
                    </div>
                </div>
                </form>                    
                
            </div>
            

        </div>
@endsection
