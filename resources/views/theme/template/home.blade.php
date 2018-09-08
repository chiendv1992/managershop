@extends('theme.master')
@section('title')
        Home
@endsection
@section('content')
    <div class="container">
        <div class="shoes-grid">
            <a href="single.html">
                <div class="wrap-in">
                    <div class="wmuSlider example1 slide-grid">
                        <div class="wmuSliderWrapper">
                            @foreach($banner as $key => $bn)
                            <article style="position: absolute; width: 100%; opacity: 0;">
                                <div class="banner-matter">
                                    <div class="col-md-5 banner-bag">
                                        <img class="img-responsive " src="{{asset('upload/images/banner')}}/{{$bn->image}}" alt=" " />
                                    </div>
                                    <div class="col-md-7 banner-off">
                                        <h2>FLAT 50% 0FF</h2>
                                        <label>FOR ALL PURCHASE <b>VALUE</b></label>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>
                                        <span class="on-get">GET NOW</span>
                                    </div>

                                    <div class="clearfix"> </div>
                                </div>
                            </article>  
                            @endforeach                          
                        </div>

            </a>
            <ul class="wmuSliderPagination">
                @foreach($banner as $key => $bn)
                    <li><a href="#" class="">{{$key}}</a></li>
                @endforeach 
            </ul>
            <script src="{{asset('frontend/js/jquery.wmuSlider.js')}}"></script>
            <script>
                $('.example1').wmuSlider();
            </script>
        </div>
    </div>
    </a>
    <!---->
    <div class="shoes-grid-left">
       @foreach($product as $pro)
        <a href="{{url('/product')}}/{{$pro->id}}/{{$pro->name}}">
            <div class="col-md-6 con-sed-grid sed-left-top">
                <div class=" elit-grid">
                    <h4>{{$pro->name}}</h4>
                    <label>FOR ALL PURCHASE VALUE</label>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, </p>
                    <span class="on-get">GET NOW</span>
                </div>
                <img class="img-responsive shoe-left" src="{{asset('upload/images/product/')}}/{{ $pro->image }}" alt=" " />

                <div class="clearfix"> </div>
            </div>
        </a>
        @endforeach
    </div>
    <div class="products">
        <h5 class="latest-product">LATEST PRODUCTS</h5>
        <a class="view-all" href="{{url('/product')}}">VIEW ALL<span> </span></a>
    </div>
    <div class="product-left">
        @foreach($productnew as $key => $value)
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
    </div>
    @endsection
