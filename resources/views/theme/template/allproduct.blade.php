@extends('theme.master')
@section('title')
    All Product
@endsection
@section('content')
    <div class="container">
        <div class="shoes-grid">


    <!---->

    <div class="products">
        <h5 class="latest-product">LATEST PRODUCTS</h5>
    </div>
    <div class="product-left">
        @foreach($product as $key => $value)
            <div class="col-md-4 chain-grid
                    @if(($key +1) % 3)
            {{ '' }}
            @else
            {{ 'grid-top-chain' }}
            @endif
                    ">
                <a href="{{url('/product')}}/{{$value->id}}/{{$value->name}}"><img class="img-responsive chain" src="{{asset('upload/images/product/')}}/{{ $value->image }}" alt=" " /></a>
                <span class="star"> </span>
                <div class="grid-chain-bottom">
                    <h6><a href="{{url('/product')}}/{{$value->id}}">{{ $value->name }}</a></h6>
                    <div class="star-price">
                        <div class="dolor-grid">
                            @if($value->sale == 0)
                                <span class='actual'>{{ $value->price }}</span><br>
                                <span class="reducedfrom"> </span>
                            @else
                                <span class='actual'>{{ $value->price * $value->sale /100 }}</span><br>
                                <span class="reducedfrom">
                                {{ $value->price }}
                            </span>
                            @endif
                        </div>
                        <a class="now-get get-cart" href="#">ADD TO CART</a>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
            {{$product->links()}}
    </div>
@endsection
