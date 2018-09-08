@include('theme.layout.function')
<div class="sub-cate">
    <div class=" top-nav rsidebar span_1_of_left">
        <h3 class="cate">CATEGORIES</h3>
        <ul class="menu">
          <!--   {{--<li class="item1"><a href="#">Curabitur sapien<img class="arrow-img" src="{{asset('frontend/images/arrow1.png')}}" alt=""/> </a>--}}
                {{--<ul class="cute">--}}
                    {{--<li class="subitem1"><a href="product.html">Cute Kittens </a></li>--}}
                    {{--<li class="subitem2"><a href="product.html">Strange Stuff </a></li>--}}
                    {{--<li class="subitem3"><a href="product.html">Automatic Fails </a></li>--}}
                {{--</ul>--}}
            {{--</li>--}} -->
            @foreach($category as $menu)
                <ul class="kid-menu ">
                    <li><a href="{{url('/category')}}/{{$menu->id}}/{{str_replace(' ','-',stripUnicode($menu->name))}}.html">{{$menu->name}}</a></li>
                </ul>
            @endforeach
        </ul>
    </div>
    <!--initiate accordion-->
    <script type="text/javascript">
        $(function() {
            var menu_ul = $('.menu > li > ul'),
                menu_a  = $('.menu > li > a');
            menu_ul.hide();
            menu_a.click(function(e) {
                e.preventDefault();
                if(!$(this).hasClass('active')) {
                    menu_a.removeClass('active');
                    menu_ul.filter(':visible').slideUp('normal');
                    $(this).addClass('active').next().stop(true,true).slideDown('normal');
                } else {
                    $(this).removeClass('active');
                    $(this).next().stop(true,true).slideUp('normal');
                }
            });

        });
    </script>
    <br>
    <a class="view-all all-product" href="{{url('/product')}}">VIEW ALL PRODUCTS<span> </span></a>
    <br>
    <div class=" chain-grid menu-chain">
        <a href="#"><img class="img-responsive chain" src="{!!  asset('frontend/images/wat.jpg') !!}" alt=" " /></a>
        <div class="grid-chain-bottom chain-watch">
            <span class="actual dolor-left-grid">300$</span>
            <span class="reducedfrom">500$</span>
            <h6><a href="single.html">Lorem ipsum dolor</a></h6>
        </div>
    </div>

</div>