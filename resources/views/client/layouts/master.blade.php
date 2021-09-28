<!DOCTYPE html>
<html lang="zxx">
@include('client.components.head')
<body>
@section('custom-style')
    <style>
        .featured__item {
            margin-bottom: 50px;
            border: solid green 1px !important;
            padding: 10px 10px;
            border-radius: 10px;
        }
    </style>
@endsection
@include('.client.components.header')

{{--<section class="categories">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="categories__slider owl-carousel">--}}
{{--                <div class="col-lg-3">--}}
{{--                    <div class="categories__item set-bg" data-setbg="/libs/client/img/categories/cat-1.jpg">--}}
{{--                        <h5><a href="#">Trái Cây Tươi</a></h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3">--}}
{{--                    <div class="categories__item set-bg" data-setbg="/libs/client/img/categories/cat-3.jpg">--}}
{{--                        <h5><a href="#">Rau</a></h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3">--}}
{{--                    <div class="categories__item set-bg" data-setbg="/libs/client/img/categories/cat-4.jpg">--}}
{{--                        <h5><a href="#">drink fruits</a></h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3">--}}
{{--                    <div class="categories__item set-bg" data-setbg="/libs/client/img/categories/cat-5.jpg">--}}
{{--                        <h5><a href="#">drink fruits</a></h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản phẩm nổi bật</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Tất cả</li>
                        <li data-filter=".vegetables">Rau</li>
                        <li data-filter=".bulb">Củ</li>
                        <li data-filter=".fruit">Quả</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row featured__filter">
            @foreach($rau as $obj)
                <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{$obj->thumbnail}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="/productDetail/{{$obj->id}}"><i class="fas fa-info"></i></a>
                                </li>
                                <li><a href="/shopping/add?productId={{$obj->id}}&productQuantity=1"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$obj->name}}</a></h6>
                            <h5>{{number_format($obj->price)}} VND</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach($cu as $obj)
                <div class="col-lg-3 col-md-4 col-sm-6 mix bulb">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{$obj->thumbnail}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="/productDetail/{{$obj->id}}"><i class="fas fa-info"></i></a>
                                </li>
                                <li><a href="/shopping/add?productId={{$obj->id}}&productQuantity=1"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$obj->name}}</a></h6>
                            <h5>{{number_format($obj->price)}} VND</h5>
                        </div>
                    </div>
                </div>
            @endforeach
            @foreach($qua as $obj)
                <div class="col-lg-3 col-md-4 col-sm-6 mix fruit">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{$obj->thumbnail}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="/productDetail/{{$obj->id}}"><i class="fas fa-info"></i></a>
                                </li>
                                <li><a href="/shopping/add?productId={{$obj->id}}&productQuantity=1"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$obj->name}}</a></h6>
                            <h5>{{number_format($obj->price)}} VND</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="latest-product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản Phẩm Mới Nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[0] -> thumbnail}}">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[0] -> name}}</h6>
                                    <span>{{number_format($newProduct[0] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[1] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[1] -> name}}</h6>
                                    <span>{{number_format($newProduct[1] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[2] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[2] -> name}}</h6>
                                    <span>{{number_format($newProduct[2] -> price)}} VND</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[3] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[3] -> name}}</h6>
                                    <span>{{number_format($newProduct[3] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[4] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[4] -> name}}</h6>
                                    <span>{{number_format($newProduct[4] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[5] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[5] -> name}}</h6>
                                    <span>{{number_format($newProduct[5] -> price)}} VND</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Tốt Cho Mùa Dịch</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[82] -> thumbnail}}">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[82] -> name}}</h6>
                                    <span>{{number_format($newProduct[82] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[23] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[23] -> name}}</h6>
                                    <span>{{number_format($newProduct[23] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[86] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[86] -> name}}</h6>
                                    <span>{{number_format($newProduct[86] -> price)}} VND</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[75] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[75] -> name}}</h6>
                                    <span>{{number_format($newProduct[75] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[68] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[68] -> name}}</h6>
                                    <span>{{number_format($newProduct[68] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[8] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[8] -> name}}</h6>
                                    <span>{{number_format($newProduct[8] -> price)}} VND</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="latest-product__text">
                    <h4>Sản Phẩm Hot Nhất</h4>
                    <div class="latest-product__slider owl-carousel">
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[83] -> thumbnail}}">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[83] -> name}}</h6>
                                    <span>{{number_format($newProduct[83] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[80] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[80] -> name}}</h6>
                                    <span>{{number_format($newProduct[80] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[79] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[79] -> name}}</h6>
                                    <span>{{number_format($newProduct[79] -> price)}} VND</span>
                                </div>
                            </a>
                        </div>
                        <div class="latest-prdouct__slider__item">
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[42] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[42] -> name}}</h6>
                                    <span>{{number_format($newProduct[42] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[35] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[35] -> name}}</h6>
                                    <span>{{number_format($newProduct[35] -> price)}} VND</span>
                                </div>
                            </a>
                            <a href="#" class="latest-product__item">
                                <div class="latest-product__item__pic">
                                    <img src="{{$newProduct[24] -> thumbnail}}"
                                         alt="">
                                </div>
                                <div class="latest-product__item__text">
                                    <h6>{{$newProduct[24] -> name}}</h6>
                                    <span>{{number_format($newProduct[24] -> price)}} VND</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('.client.components.footer')

@include('.client.components.script')

<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
    window.__lc = window.__lc || {};
    window.__lc.license = 13154007;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)};
        var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){
                i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},
            get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");
                return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){
                var n=t.createElement("script");
                n.async=!0,n.type="text/javascript",
                    n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};
        !n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript>
    <a href="https://www.livechatinc.com/chat-with/13154007/" rel="nofollow">Chat with us</a>,
    powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a>
</noscript>
<!-- End of LiveChat code -->

</body>
</html>
