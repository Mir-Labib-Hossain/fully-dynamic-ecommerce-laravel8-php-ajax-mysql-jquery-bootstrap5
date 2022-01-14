@extends("master")
@section("content")
<style>
    @import url("https://unpkg.com/swiper@6.0.2/swiper-bundle.min.css");

    /* link of font familt for caursel header (.name) */
    @import url("https://fonts.googleapis.com/css?family=Anton");
    @import url("https://fonts.googleapis.com/css?family=Kaushan Script");
    @import url("https://fonts.googleapis.com/css?family=Cinzel Decorative");


    .gallery-wrapper {
        position: relative;
        z-index: 1;
    }

    .gallery-wrapper * {
        color: white;
    }

    .gallery-wrapper .fa-angle-left,
    .gallery-wrapper .fa-angle-right {
        font-size: 30px !important
    }

    .gallery-wrapper .content {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 3vh;
        background-color: white;
        background: linear-gradient(to bottom, #fdd670, white);

    }

    .gallery-wrapper .content .gallery.full {
        position: relative;
        display: flex;
        align-items: center;
    }

    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper {
        display: flex;
        height: 80vh;
        align-items: center;
    }

    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide {
        position: relative;
        height: 50vh;
        transition: all 0.4s ease-out;
        box-sizing: border-box;
        width: auto;
        opacity: 0.25;
    }

    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide.swiper-slide-prev,
    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide.swiper-slide-next {
        width: 20% !important;
    }

    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide.swiper-slide-active {
        height: 80vh;
        width: 60% !important;
        opacity: 1;
    }

    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide.swiper-slide-active:hover .zoom {
        opacity: 1;
        pointer-events: auto;
        visibility: visible;
    }

    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide .image {
        width: 100%;
        height: 100%;
    }

    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide .image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
    }

    /* .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide .overlay {
        position: absolute;
        left: 0;
        bottom: 0;
        z-index: 2;
        width: 100%;
        height: auto;
        padding: 50px 50px 30px 50px;
        background: #000;
        background: linear-gradient(0deg, rgba(0, 0, 0, .8) 0%, rgba(0, 0, 0, .4) 50%, rgba(0, 0, 0, 0) 100%);
        display: flex;
        align-items: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease-out;
    } */
    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide .overlay {
        position: absolute;
        bottom: 0;
        z-index: 2;
        width: 100%;
        height: 100%;
        padding: 50px 50px 30px 50px;
        background: #000;
        background: linear-gradient(0deg, rgba(0, 0, 0, .8) 0%, rgba(0, 0, 0, .4) 50%, rgba(0, 0, 0, 0) 100%);
        display: flex;
        align-items: center;
        opacity: 0;
        visibility: hidden;
        transition: all 1s ease-out;
        display: grid !important;
        place-content: center;
    }

    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide .overlay.show {
        opacity: 1;
        visibility: visible;
    }

    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide .overlay.show .text-wrap {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        text-align: center;
    }

    .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide .overlay .text-wrap {
        display: flex;
        flex-direction: column;
        opacity: 0;
        visibility: hidden;
        transform: translateY(50px);
        transition: all 0.4s linear;
    }

    .gallery-wrapper .content .gallery .swiper-container .swiper-wrapper .swiper-slide .overlay .text-wrap .name h1 {
        text-transform: uppercase !important;
        font-size: 6vw !important;
    }

    .gallery-wrapper .content .gallery .swiper-container .swiper-wrapper .swiper-slide .overlay .text-wrap .caption p {}

    .gallery-wrapper .content .gallery.full .swiper-next-button,
    .gallery-wrapper .content .gallery.full .swiper-prev-button {
        position: absolute;
        z-index: 99;
        outline: none;
        transition: all 0.2s linear;
        width: 20%;
        height: 50vh;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        cursor: pointer;
    }

    .gallery-wrapper .content .gallery.full .swiper-next-button.swiper-button-disabled,
    .gallery-wrapper .content .gallery.full .swiper-prev-button.swiper-button-disabled {
        opacity: 0.2;
    }

    .gallery-wrapper .content .gallery.full .swiper-next-button em,
    .gallery-wrapper .content .gallery.full .swiper-prev-button em {
        font-size: 68px;
    }

    .gallery-wrapper .content .gallery.full .swiper-next-button {
        right: 0;
        padding-left: 5vw;
        justify-content: flex-start;
    }

    .gallery-wrapper .content .gallery.full .swiper-prev-button {
        left: 0;
        padding-right: 5vw;
    }

    .gallery-wrapper .content .gallery.thumb {
        position: relative;
        width: 100%;
        max-width: 1020px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        padding-left: 12px;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-container {
        width: 100%;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-container .swiper-wrapper .swiper-slide {
        position: relative;
        height: 10vh;
        box-sizing: border-box;
        cursor: pointer;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-container .swiper-wrapper .swiper-slide.swiper-slide-thumb-active .image {
        box-shadow: inset 0px 0px 0px 2px #ed1b28;
        padding: 2px;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-container .swiper-wrapper .swiper-slide.swiper-slide-thumb-active .image .overlay {
        opacity: 1;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-container .swiper-wrapper .swiper-slide .image {
        width: 100%;
        height: 100%;
        position: relative;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-container .swiper-wrapper .swiper-slide .image img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: cover;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-container .swiper-wrapper .swiper-slide .image .overlay {
        position: absolute;
        left: 2px;
        top: 2px;
        background-color: rgba(43, 44, 54, .6);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        width: calc(100% - 4px);
        height: calc(100% - 4px);
        opacity: 0;
        transition: all 0.2s linear;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-next-button {
        right: -15px;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-prev-button {
        left: -5px;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-prev-button em {
        transform: rotate(180deg);
    }

    .gallery-wrapper .content .gallery.thumb .swiper-next-button,
    .gallery-wrapper .content .gallery.thumb .swiper-prev-button {
        position: absolute;
        z-index: 99;
        outline: none;
        transition: all 0.2s linear;
        width: 32px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ed1b28;
        cursor: pointer;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-next-button:hover,
    .gallery-wrapper .content .gallery.thumb .swiper-prev-button:hover {
        background-color: #c5101b;
    }

    .gallery-wrapper .content .gallery.thumb .swiper-next-button.swiper-button-disabled,
    .gallery-wrapper .content .gallery.thumb .swiper-prev-button.swiper-button-disabled {
        opacity: 0.2;
    }

    /*Mobile*/
    @media only screen and (max-width: 1024px) {
        .gallery-wrapper .content {
            padding: 5vh 0;
        }

        .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper {
            height: 70vh;
        }

        .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide {
            height: 50vh;
        }

        .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide.swiper-slide-prev,
        .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide.swiper-slide-next {
            width: 10% !important;
        }

        .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide.swiper-slide-active {
            height: 70vh;
            width: 80% !important;
        }

        .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide .overlay {
            padding: 20px;
        }

        .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide .overlay .text-wrap {
            transform: translateY(0);
        }

        .gallery-wrapper .content .gallery.full .swiper-container .swiper-wrapper .swiper-slide .overlay .text-wrap .caption p {
            font-size: 1.06em;
        }

        .gallery-wrapper .content .gallery.full .swiper-next-button,
        .gallery-wrapper .content .gallery.full .swiper-prev-button {
            width: 10%;
            height: 50vh;
            align-items: center;
            justify-content: center;
        }

        .gallery-wrapper .content .gallery.full .swiper-next-button em,
        .gallery-wrapper .content .gallery.full .swiper-prev-button em {
            font-size: 45px;
        }

        .gallery-wrapper .content .gallery.full .swiper-next-button {
            padding-left: 0;
        }

        .gallery-wrapper .content .gallery.full .swiper-prev-button {
            padding-right: 0;
        }

        .gallery-wrapper .content .gallery.thumb {
            padding: 0 30px;
            max-width: 100%;
        }

        .gallery-wrapper .content .gallery.thumb .swiper-container .swiper-wrapper .swiper-slide {
            height: 80px;
        }

        .gallery-wrapper .content .gallery.thumb .swiper-next-button {
            right: 10px;
        }

        .gallery-wrapper .content .gallery.thumb .swiper-prev-button {
            left: 10px;
        }
    }
</style>
<div class="gallery-wrapper">
    <div class="content">
        <div class="gallery full">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($carousel_data as $c_data)
                    <a href="{{$c_data['link']}}" class="swiper-slide {{$c_data['id']==1?'swiper-slide-active':''}}">
                        <div class="image">
                            <img src="/images/{{$c_data['file']}}" alt="" />
                        </div>
                        <div class="overlay">
                            <div class="text-wrap">
                                <div class="name">
                                    <h1 style="{{$c_data['font_family']}}">{{$c_data['name']}}</h1>
                                </div>
                                <div class="caption">
                                    <p>
                                        {{$c_data['offer_description']}}
                                    </p>
                                </div>
                                <!-- <div>
                                    <i class="fas fa-shopping-cart" style="font-size:medium ;"></i>
                                    <i class="fas fa-money-bill-alt" style="font-size:medium"></i>
                                </div> -->
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="swiper-next-button">
                <i class="fas fa-angle-right text-warning"></i>
            </div>
            <div class="swiper-prev-button">
                <i class="fas fa-angle-left text-warning"></i>
            </div>
        </div>

        <div class="gallery thumb">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach($carousel_data as $c_data)
                    <div class="swiper-slide {{$c_data['id']==1?'swiper-slide-thumb-active':''}}">
                        <div class="image">
                            <img src="/images/{{$c_data['file']}}" alt="" />
                            <div class="overlay">
                                <i class="fas fa-eye"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="swiper-next-button">
                <i class="fas fa-angle-right"></i>
            </div>
            <div class="swiper-prev-button">
                <i class="fas fa-angle-left"></i>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="container-fluid ">
        <hr>
        <div class="p d-none"></div>
        <h1 class="header">Most Reviewed Products :</h1>
        <div class="row products" id="reviewed">
            @foreach($reviewed_data as $r_data)
            <div class="col-sm-2">
                <div style="height:300px">
                    <a href="detail/{{$r_data['id']}}">
                        <div class="product-img">
                            <img src="{{$r_data['img']}}" width="95%" alt="products images">
                            <div class="product-overlay">
                                <p><i class="fas fa-search-plus"></i>Details</p>
                            </div>
                            <div class="product-rate">
                                <!-- <h1 class="header m-0 p-0">{{number_format($r_data["avg_rating"], 2, '.', '');}}</h1> -->
                                @if($r_data["avg_rating"]>=1)
                                <i data-aos="zoom-in-up" data-aos-duration="1500" class="fas fa-star text-warning"></i>
                                @endif
                                @if($r_data["avg_rating"]>=2)
                                <i data-aos="zoom-in-up" data-aos-duration="1500" class="fas fa-star text-warning"></i>
                                @endif
                                @if($r_data["avg_rating"]>=3)
                                <i data-aos="zoom-in-up" data-aos-duration="1500" class="fas fa-star text-warning"></i>
                                @endif
                                @if($r_data["avg_rating"]>=4)
                                <i data-aos="zoom-in-up" data-aos-duration="1500" class="fas fa-star text-warning"></i>
                                @endif
                                @if($r_data["avg_rating"]==5)
                                <i data-aos="zoom-in-up" data-aos-duration="1500" class="fas fa-star text-warning"></i>
                                @endif
                                @if ((int) $r_data["avg_rating"] != $r_data["avg_rating"])
                                <i data-aos="zoom-in-up" data-aos-duration="1500" class="fas fa-star-half text-warning"></i>
                                @endif

                            </div>
                        </div>

                        <div class="product-details">
                            <hr data-aos-duration="1500" data-aos="zoom-in-right">
                            <p class="ellipsis">{{$r_data['name']}}</p>
                            <h4 class="text-danger font-bold">${{$r_data['price']}}</h4>
                            <p class="d-none">{{$r_data['description']}}</p> <!-- added for fluent searching -->
                        </div>

                    </a>
                    <a href="/add_to_cart/{{$r_data['id']}}" class="product-cart-btn">
                        <button type="button" class="btn btn-outline-warning"><i class="fas fa-shopping-cart" style="font-size: xx-small;"></i>Add to Cart</button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <hr>
        <br>
        <h1 class="header">Our Category Section</h1>
        <div class="category">
            <div class="row">
                <a class="col-sm-4" href="category/electronic">
                    <div class="category-cover bg-warning">
                    <img src="https://img.icons8.com/cotton/100/000000/lamp--v4.png"/>                    <h4>Electronics</h4>
                    </div>
                    <div class="category-details">
                        <p>Electronics</p>
                        <div class="row">
                            @foreach($electronic_data as $electronic_data)
                            <div class="col-sm-4">
                                <img src="{{$electronic_data['img']}}" class="img-fluid h-100" alt="Electronics product img">
                            </div>
                            @endforeach

                        </div>
                    </div>
                </a>
                <a class="col-sm-4" href="category/fashion">
                    <div class="category-cover bg-warning">
                    <img src="https://img.icons8.com/cotton/100/000000/women-shoes.png"/>
                        <h4>Fashion</h4>
                    </div>
                    <div class="category-details">
                        <p>Fashion</p>
                        <div class="row">
                            @foreach($fashion_data as $fashion_data)
                            <div class="col-sm-4">
                                <img src="{{$fashion_data['img']}}" class="img-fluid h-100" alt="Electronics product img">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </a>
                <a class="col-sm-4" href="category/makeup">
                    <div class="category-cover bg-warning">
                    <img src="https://img.icons8.com/cotton/100/000000/lipstick.png"/>                        <h4>Makeup</h4>
                    </div>
                    <div class="category-details">
                        <p>Makeup</p>
                        <div class="row">
                            @foreach($makeup_data as $makeup_data)
                            <div class="col-sm-4">
                                <img src="{{$makeup_data['img']}}" class="img-fluid h-100" alt="Electronics product img">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </a>
            </div>
            <div class="row">
                <a class="col-sm-4" href="category/travel">
                    <div class="category-cover bg-warning">
                    <img src="https://img.icons8.com/cotton/100/000000/tourist-backpack--v1.png"/>
                    <h4>Travelling</h4>
                    </div>
                    <div class="category-details">
                        <p>Travelling</p>
                        <div class="row">
                            @foreach($travel_data as $travel_data)
                            <div class="col-sm-4">
                                <img src="{{$travel_data['img']}}" class="img-fluid h-100" alt="Electronics product img">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </a>
                <a class="col-sm-4" href="category/baby">
                    <div class="category-cover bg-warning">
                    <img src="https://img.icons8.com/cotton/100/000000/pacifier.png"/>                        <h4>Baby & Toys</h4>
                    </div>
                    <div class="category-details">
                        <p>Baby & Toys</p>
                        <div class="row">
                            @foreach($baby_data as $baby_data)
                            <div class="col-sm-4">
                                <img src="{{$baby_data['img']}}" class="img-fluid h-100" alt="Electronics product img">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </a>
                <a class="col-sm-4" href="category/sport">
                    <div class="category-cover bg-warning">
                    <img src="https://img.icons8.com/cotton/100/000000/basketball--v3.png"/>
                        <h4>Sports</h4>
                    </div>
                    <div class="category-details">
                        <p>Sports</p>
                        <div class="row">
                            @foreach($sports_data as $sports_data)
                            <div class="col-sm-4">
                                <img src="{{$sports_data['img']}}" class="img-fluid h-100" alt="Electronics product img">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <hr>
        <br>
        <h1 class="header">What Our Client Thinks</h1>
        <div id="carouselContent" class="carousel slide quote-carousel" data-ride="carousel" 2px>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active text-center p-4">
                    <p class="quote">"I have been shopping from E-com for the past few months and i am loving the experience. Have been shopping from here and i have recommended my relatives too. They are also happy with the service. The prices are comparatively low and the products are genuine."</p>
                    <p class="quote-name"> - Mir Fayek Hossain</p>
                </div>
                <div class="carousel-item text-center p-4">
                    <p class="quote">"Satisfied by their professionalism ! 5 Star quality service."</p>
                    <h4 class="quote-name"> - Rashed Rayhan Ayon</h4>
                </div>
            </div>
            <a class="carousel-control-prev bg-danger" href="#carouselContent" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next bg-danger" href="#carouselContent" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<h1 class="header">Our Achievement</h2>
    <section class="fadeIn animated wow" style="visibility: visible; animation-name: fadeIn;">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="300ms" style="visibility: visible; animation-duration: 300ms; animation-name: fadeInUp;">
                    <img src="https://img.icons8.com/cotton/100/000000/mobile-order.png" />
                    <span id="anim-number-pizza" class="counter-number"></span>
                    <span class="timer counter alt-font appear" data-to="2820" data-speed="7000">2820</span>
                    <p class="counter-title">Total Ordered</p>
                </div>

                <div class="col-md-3 col-sm-6 bottom-margin text-center counter-section wow fadeInUp sm-margin-bottom-ten animated" data-wow-duration="600ms" style="visibility: visible; animation-duration: 600ms; animation-name: fadeInUp;">
                    <img src="https://img.icons8.com/cotton/100/000000/smiling-face-with-hearts-icon.png" /> <span class="timer counter alt-font appear" data-to="980" data-speed="7000">980</span>
                    <span class="counter-title">Happy Customers</span>
                </div>

                <div class="col-md-3 col-sm-6 bottom-margin-small text-center counter-section wow fadeInUp xs-margin-bottom-ten animated" data-wow-duration="900ms" style="visibility: visible; animation-duration: 900ms; animation-name: fadeInUp;">
                    <img src="https://img.icons8.com/cotton/100/000000/goal.png" />
                    <span class="timer counter alt-font appear" data-to="810" data-speed="7000">810</span>
                    <span class="counter-title">Projects Completed</span>
                </div>

                <div class="col-md-3 col-sm-6 text-center counter-section wow fadeInUp animated" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-name: fadeInUp;">
                <img src="https://img.icons8.com/cotton/100/000000/shop--v3.png"/>                    <span class="timer counter alt-font appear" data-to="11" data-speed="7000">11</span>
                    <span class="counter-title">Total Outllets</span>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <h1 class="header">Be a part of our family <i class="fas fa-heart" style="font-size: x-large!important;"></i></h1>
    <div class="row card-deck">
        <div class="col-sm-4 card">
            <img class="img-fluid" src="https://cdn.dribbble.com/users/1162077/screenshots/7109190/support_1x.png" alt="">
        </div>
        <div class="col-sm-4 card">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <div class="input-group-text" id="basic-addon1">
                        <div class="flag-green">
                            <div class="flag-red"></div>
                        </div>
                        <p class="font-bold m-auto" style="font-size: large!important;">+088</p>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="01XXXXXXXXX" aria-label="01XXXXXXXXX" aria-describedby="basic-addon2" style="height: 40px;font-size:large">
                <a href="/login" class="input-group-append">
                    <button class="btn btn-warning" type="button">
                        <p class="font-bold m-auto">Join Now</p>
                    </button>
                </a>
            </div>
            <a href="/login" class="text-center text-secondary">or Register</a>
        </div>
        <div class="col-sm-4 card">
            <h2 class="header">Get Our App</h2>
            <img class="m-auto" src="https://www.pngrepo.com/png/171833/512/qr-code.png" alt="" width="200px">
            <div class="row mt-5">
                <button class="col-sm-6">
                    <img class="img-fluid" src="https://myschoolio.com/backend/usertemplate/custom/images/stores/google.png" style="height:50px!important;">
                </button>
                <button class="col-sm-6">
                    <img class="img-fluid" src="https://thejuicebardallas.com/wp-content/uploads/2019/05/app-store.png" style="height:50px!important;">
                </button>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function() {
            $('.counter').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });


            $(".category .col-sm-4").mouseover(
                function() {
                    if (window.innerWidth > 870) {
                        $(this).children(".category-cover").slideUp("slow");
                        $(this).children(".category-details").slideDown("slow");
                    }
                }
            );
            $(".category .col-sm-4").mouseleave(
                function() {
                    if (window.innerWidth > 870) {
                        $(this).children(".category-cover").slideDown("slow");
                        $(this).children(".category-details").slideUp("slow");
                    }
                }
            );
        });
    </script>
    <script src="https://unpkg.com/swiper@6.0.2/swiper-bundle.min.js"></script>
    <script>
        $(function() {
            if ($('.gallery-wrapper').length) {
                var galleryThumbs = new Swiper('.gallery-wrapper .content .gallery.thumb .swiper-container', {
                    speed: 900,
                    effect: 'slide',
                    spaceBetween: 12,
                    grabCursor: false,
                    simulateTouch: true,
                    loop: false,
                    watchSlidesVisibility: true,
                    watchSlidesProgress: true,
                    navigation: {
                        nextEl: '.gallery-wrapper .content .gallery.thumb .swiper-next-button',
                        prevEl: '.gallery-wrapper .content .gallery.thumb .swiper-prev-button',
                    },
                    breakpoints: {
                        320: {
                            slidesPerView: 2,
                            spaceBetween: 10,
                        },
                        414: {
                            slidesPerView: 3,
                            spaceBetween: 10
                        },
                        768: {
                            slidesPerView: 5,
                            spaceBetween: 10
                        },
                        1024: {
                            slidesPerView: 7,
                            spaceBetween: 10
                        }
                    },
                    on: {
                        init: function() {
                            let containerThumbWidth = $('.gallery-wrapper .content .gallery.thumb').outerWidth();

                            let totalThumbWidth = 0;

                            $('.gallery.thumb .swiper-container .swiper-wrapper .swiper-slide').each(function() {
                                let thumbWidth = $(this).outerWidth();
                                totalThumbWidth += thumbWidth
                            });



                            if (totalThumbWidth < containerThumbWidth) {
                                $('.gallery.thumb .swiper-next-button, .gallery.thumb .swiper-prev-button').addClass('hide');
                            } else {
                                $('.gallery.thumb .swiper-next-button, .gallery.thumb .swiper-prev-button').removeClass('hide');
                            }
                        }
                    }
                });

                var galleryFull = new Swiper('.gallery-wrapper .content .gallery.full .swiper-container', {
                    speed: 900,
                    effect: 'slide',
                    slidesPerView: 3,
                    spaceBetween: 0,
                    centeredSlides: true,
                    autoplay: {
                        delay: 7000,
                        disableOnInteraction: false,
                        stopOnLastSlide: false
                    },
                    keyboard: {
                        enabled: true,
                    },
                    grabCursor: false,
                    simulateTouch: false,
                    loop: true,
                    navigation: {
                        nextEl: '.gallery-wrapper .content .gallery.full .swiper-next-button',
                        prevEl: '.gallery-wrapper .content .gallery.full .swiper-prev-button',
                    },
                    thumbs: {
                        swiper: galleryThumbs
                    },
                    on: {
                        slideChangeTransitionStart: function() {
                            $('.gallery-wrapper .content .gallery.full .swiper-slide .overlay').removeClass('show');
                        },
                        slideChangeTransitionEnd: function() {
                            $('.gallery-wrapper .content .gallery.full .swiper-slide-active .overlay').addClass('show');
                        }
                    }
                });
            }
        });
    </script>
    @endsection