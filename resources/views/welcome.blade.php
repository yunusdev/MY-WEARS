@extends('layouts.base')


@section('title')
Home
@endsection

@section('content')
    @if (session('status'))
        <div class="alert alert-success alert-has-icon">
            <div class="alert-body font-weight-bold">
                <span class="alert-icon" style="margin-right: 10px"><i class="far fa-lightbulb"></i></span>
                    {{ session('status') }}
            </div>
        </div>
    @endif
    <!-- Main Slider-->
    <section class="hero-slider mb-5" style="background-image: url(img/hero-slider/main-bg.jpg);">
        <div class="owl-carousel large-controls dots-inside" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: true, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 7000 }">
            <div class="item">
                <div class="container padding-top-3x">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                            <div class="from-bottom">
{{--                                <img class="d-inline-block w-150 mb-4" src="img/hero-slider/logo02.png" alt="Puma">--}}
                                <div class="h2 text-body text-normal mb-2 pt-1">{{$config->home_caption_top_1}}</div>
                                <div class="h2 text-body text-normal mb-4 pb-1">{{$config->home_caption_bottom_1}}</div>
                            </div><a class="btn btn-primary scale-up delay-1" href="{{$config->home_link_1}}">Shop Now</a>
                        </div>
                        <div class="col-md-6 padding-bottom-2x mb-3"><img width="550" class="d-block mx-auto" src="{{$config->home_carousel_image_1}}" alt="Product 1"></div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="container padding-top-3x">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                            <div class="from-bottom">
{{--                                <img class="d-inline-block w-200 mb-4" src="img/hero-slider/logo01.png" alt="Converse">--}}
                                <div class="h2 text-body text-normal mb-2 pt-1">{{$config->home_caption_top_2}}</div>
                                <div class="h2 text-body text-normal mb-4 pb-1">{{$config->home_caption_bottom_2}}</div>
                            </div><a class="btn btn-primary scale-up delay-1" href="{{$config->home_link_2}}">Shop Now</a>
                        </div>
                        <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" width="550" src="{{$config->home_carousel_image_2}}" alt=""></div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="container padding-top-3x">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-5 col-md-6 padding-bottom-2x text-md-left text-center">
                            <div class="from-bottom">
{{--                                <img class="d-inline-block mb-4" src="img/hero-slider/logo03.png" style="width: 125px;" alt="Motorola">--}}
                                <div class="h2 text-body text-normal mb-2 pt-1">{{$config->home_caption_top_3}}</div>
                                <div class="h2 text-body text-normal mb-4 pb-1">{{$config->home_caption_bottom_3}}</div>
                            </div><a class="btn btn-primary scale-up delay-1" href="{{$config->home_link_3}}">Shop Now</a>
                        </div>
                        <div class="col-md-6 padding-bottom-2x mb-3"><img class="d-block mx-auto" width="550" src="{{$config->home_carousel_image_3}}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Categories-->
    @if(count($top_categories) > 0)
        <section class="container">
            <h3 class="text-center mb-30">Top Categories..</h3>
            <div class="row">
                @foreach($top_categories as $key => $category)

                    @if(count($category->top_products) > 0)
                        <div class="col-md-4 col-sm-6" >
                            <div class="card mb-30">
                                <a class="card-img-tiles" href="{{route('category.products', $category->slug)}}">
                                    <div class="inner">
                                        <div class="main-img"><img style="height: 179px !important; " src="{{$category->top_products[0]->front_image}}" alt="Category"></div>
                                        <div class="thumblist"><img style="height: 83px !important; " src="{{$category->top_products[1]->front_image}}" alt="Category">
                                            <img style="height: 83px !important; " src="{{$category->top_products[2]->front_image}}" alt="Category"></div>
                                    </div>
                                </a>
                                <div class="card-body text-center">
                                    <h4 class="card-title">
                                        <a class="text-decoration-none" href="{{route('category.products', $category->slug)}}">{{$category->name}}</a>
                                    </h4>
                                    <p class="text-muted">Starting from N5000</p><a class="btn btn-outline-primary btn-sm" href="{{route('category.products', $category->slug)}}">View Products</a>
                                </div>
                            </div>
                        </div>

                    @endif
                @endforeach
            </div>
            <div class="text-center"><a class="btn btn-outline-secondary margin-top-none" href="/shop">All Categories</a></div>
        </section>
    @endif
    <!-- Promo #1-->

    @if($config->product)
        <section class="container-fluid padding-top-3x" >
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-6 mb-30">
                    <div class="rounded bg-faded position-relative padding-top-3x padding-bottom-3x">
                        <span class="product-badge text-danger" style="top: 24px; left: 24px;">Limited Offer</span>
                        <div class="text-center">
                            <h3 class="h2 text-normal mb-1">New</h3>
                            <h2 class="display-2 text-bold mb-2">{{$config->product->name}}</h2>
                            <h4 class="h3 text-normal mb-4">at <span class="text-bold">N{{$config->product->price}}</span>!</h4>
                            <br>
                            <a class="btn btn-primary margin-bottom-none" href="{{route('view.product', $config->product->slug)}}">Shop Now!</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 mb-30" style="min-height: 270px;">
                    <a href="{{route('view.product', $config->product->slug)}}">
                        <div class="img-cover rounded" style="background-image: url({{$config->product->front_image}})"></div>
                    </a>
                </div>
            </div>
        </section>
    @endif
    <!-- Promo #2-->
    <section class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">
{{--                <div class="fw-section rounded padding-top-1x padding-bottom-4x" style="background-image: url(images/web_shopping.png);background-position: top !important;">--}}
                <div class="fw-section rounded padding-top-4x padding-bottom-4x" style="background-image: url(images/add_to_cart.png);background-position: top !important;">
                    <span class="overlay rounded" style="opacity: .15;"></span>
                    <div class="text-center">
                        <h3 class="display-4 text-normal text-white text-shadow mb-1">Old Collection</h3>
                        <h2 class="display-2 text-bold text-white text-shadow">HUGE SALE!!!</h2>
                        <h4 class="d-inline-block h2 text-normal text-white text-shadow border-default border-left-0 border-right-0 mb-4">at our outlet stores</h4><br>
                        <a class="btn btn-primary margin-bottom-none" href="/shop">Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Products Carousel-->
    <!-- Product Widgets-->
    <leading-products-home></leading-products-home>

    <!-- Popular Brands-->
{{--    <section class="bg-faded padding-top-3x padding-bottom-3x">--}}
{{--        <div class="container">--}}
{{--            <h3 class="text-center mb-30 pb-2">Popular Brands</h3>--}}
{{--            <div class="owl-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;470&quot;:{&quot;items&quot;:3},&quot;630&quot;:{&quot;items&quot;:4},&quot;991&quot;:{&quot;items&quot;:5},&quot;1200&quot;:{&quot;items&quot;:6}} }"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/01.png" alt="Adidas"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/02.png" alt="Brooks"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/03.png" alt="Valentino"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/04.png" alt="Nike"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/05.png" alt="Puma"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/06.png" alt="New Balance"><img class="d-block w-110 opacity-75 m-auto" src="img/brands/07.png" alt="Dior"></div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Services-->
    <section style="" class=" bg-faded padding-top-3x padding-bottom-2x">
        <div class="row container mx-auto">
            <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/01.png" alt="Shipping">
                <h6>Free Worldwide Shipping</h6>
                <p class="text-muted margin-bottom-none">Free shipping for all orders over $100</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/02.png" alt="Money Back">
                <h6>Money Back Guarantee</h6>
                <p class="text-muted margin-bottom-none">We return money within 30 days</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/03.png" alt="Support">
                <h6>24/7 Customer Support</h6>
                <p class="text-muted margin-bottom-none">Friendly 24/7 customer support</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center mb-30"><img class="d-block w-90 img-thumbnail rounded-circle mx-auto mb-3" src="img/services/04.png" alt="Payment">
                <h6>Secure Online Payment</h6>
                <p class="text-muted margin-bottom-none">We posess SSL / Secure Certificate</p>
            </div>
        </div>
    </section>
    <!-- Site Footer-->

@endsection
{{--<script>--}}
{{--    import LeadingProductsHome from "../js/components/User/Shop/LeadingProductsHome";--}}
{{--    export default {--}}
{{--        components: {LeadingProductsHome}--}}
{{--    }--}}
{{--</script>--}}
