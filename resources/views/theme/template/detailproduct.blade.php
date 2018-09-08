@extends('theme.master')
@section('title')
    Detail Product
@endsection
@section('content')
    <div class="container">
        <div class="shoes-grid">
            <div class="single_grid">
                <div><br> <br></div>
                <div class="grid images_3_of_2">
                    <ul id="etalage">
                        <li>
                            <a href="optionallink.html">
                                <img class="etalage_thumb_image" src="{{asset('upload/images/product/')}}/{{$detailproduct->image}}" class="img-responsive" />
                                <img class="etalage_source_image" src="images/si4.jpg" class="img-responsive" title="" />
                            </a>
                        </li>
                        @foreach($imageproduct as $image)
                            @if($image->product_id == $detailproduct->id)
                                <li>
                                    <img class="etalage_thumb_image" src="{{asset('upload/images/product/detail')}}/{{$image->images}}" class="img-responsive"  />
                                    <img class="etalage_source_image" src="{{asset('upload/images/product/detail')}}/{{$image->images}}" class="img-responsive"  />
                                </li>
                                @else
                                {{" "}}
                            @endif
                       @endforeach
                    </ul>
                    <div class="clearfix"> </div>
                </div>
                <div class="desc1 span_3_of_2">


                    <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h4>
                    <div class="cart-b">
                        <div class="left-n ">{{$detailproduct->price}}</div>
                        <a class="now-get get-cart-in" href="#">ADD TO CART</a>
                        <div class="clearfix"></div>
                    </div>
                    <h6>Mô Tả</h6>
                    <p>{!!$detailproduct->description!!}</p>

                </div>
                <div class="clearfix"> </div>
            </div>
            <ul id="flexiselDemo1">
                <li><img src="images/pi.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
                <li><img src="images/pi1.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
                <li><img src="images/pi2.jpg" /><div class="grid-flex"><a href="#">Zumba</a><p>Rs 850</p></div></li>
                <li><img src="images/pi3.jpg" /><div class="grid-flex"><a href="#">Bloch</a><p>Rs 850</p></div></li>
                <li><img src="images/pi4.jpg" /><div class="grid-flex"><a href="#">Capzio</a><p>Rs 850</p></div></li>
            </ul>
            <script type="text/javascript">
                $(window).load(function() {
                    $("#flexiselDemo1").flexisel({
                        visibleItems: 5,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint:480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint:640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint:768,
                                visibleItems: 3
                            }
                        }
                    });

                });
            </script>
            <script type="text/javascript" src="js/jquery.flexisel.js"></script>

            <div class="toogle">
                <h3 class="m_3">Nội dung chi tiết</h3>
                <p class="m_text">{!!$detailproduct->description!!}.</p>
            </div>
            <div class="clearfix"> </div>
        </div>

@endsection
