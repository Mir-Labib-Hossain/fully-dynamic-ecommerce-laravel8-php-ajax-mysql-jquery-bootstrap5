<!-- for search -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<style>
    .right-0 {
        position: absolute;
        right: 0;
    }

    .nav-link p {
        margin: 0;
    }

    .nav-item {
        padding: 0 10px;
    }

    /* 
    #collapsibleNavbar .nav-link:hover {
        color: white !important;
        transition: .5s;
        background-color: #ff686e;
    } */

    #serch-form {
        width: 62%;
        margin: 0;
    }

    #serch {
        width: 100%;
        height: 40px;
        font-size: 13px;
    }

    nav {
        padding: 0 !important;
    }
    .dropdown:hover>.dropdown-menu {
  display: block;
}
    .dropdown-menu,
    .dropdown {
        padding: 0 !important;
        margin: 0 !important;
    }

    .dropdown-menu li a,
    .dropdown-menu a {
        height: 40px;
        font-size: 13px;
        padding-top: 10px;
        display: flex;
        justify-content: flex-start;
    }

    .fa-angle-right {
        margin-left: auto;
        padding-left: 5px;
    }

    nav img {
        width: 30px;
        margin: 0;
        margin-top: -5px;
        margin-right: 5px;
    }

    .dropdown-menu li a:focus,
    .dropdown-menu li a:hover {
        background-color: #fdd670 !important;
    }

    .log .dropdown-item p {
        font-weight: bold;
    }

    #serch-form .dropdown-menu {
        width: 53.2% !important;
    }



    .search-results {
        display: none;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu .dropdown-menu {
        top: 0;
        left: 100%;
    }
</style>
<nav class="navbar navbar-expand-md bg-warning navbar-warning m-0 rounded-0 font-bold fixed-top">
    <!-- Brand -->

    <div class="nav-item">
        <a class="nav-link" href="/">
            <p style="font-size:x-large !important;">E-Com</p>
        </a>
    </div>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">

        <ul class="navbar-nav">
            <!-- <li class="nav-item">
                <a class="nav-link btn-warning" href="/order_list">
                    <p>My Order list</p>
                </a>
            </li> -->

            <li class="nav-item dropdown">
                <a class="nav-link btn-warning " id="navbardrop" data-toggle="dropdown">
                    <p><img src="https://img.icons8.com/cotton/64/000000/empty-folder--v2.png" /> Category <i class="fas fa-angle-down"></i></p>
                </a>
                <ul class="dropdown-menu">
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#"><img src="https://img.icons8.com/cotton/64/000000/lamp--v4.png" /> Electronics & Gadgets <i class="fas fa-angle-right"></i></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a class="test" href="#"><img src="https://img.icons8.com/cotton/50/000000/touchscreen-smartphone--v2.png" /> Smartphones & Accesories <i class="fas fa-angle-right"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/category/button_phone"><img src="https://img.icons8.com/cotton/64/000000/walkie-talkie-radio.png" /> Button Phones</a></li>
                                    <li><a href="/category/smartphone"><img src="https://img.icons8.com/cotton/50/000000/iphone-x.png" /> Smartphones</a></li>
                                    <li><a href="/category/cable"><img src="https://img.icons8.com/doodle/48/000000/electrical--v1.png" /> Cables & Chargers</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="test" href="#"><img src="https://img.icons8.com/cotton/64/000000/headphones.png" /> Headphones <i class="fas fa-angle-right"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/category/wireless"><img src="https://img.icons8.com/officel/50/000000/earbud-headphones.png" /> Wireless</a></li>
                                    <li><a href="/category/wired"><img src="https://img.icons8.com/cotton/64/000000/earbud-headphones.png" /> Wired</a></li>
                                </ul>
                            </li>
                            <li><a tabindex="-1" href="/category/pc"><img src="https://img.icons8.com/cotton/64/000000/computer.png" /> PC</a></li>
                            <li><a tabindex="-1" href="/category/laptop"><img src="https://img.icons8.com/cotton/64/000000/laptop.png" /> Laptop</a></li>
                            <li><a tabindex="-1" href="/category/speaker"><img src="https://img.icons8.com/cotton/64/000000/subwoofer.png" /> Sound System</a></li>
                            <li><a tabindex="-1" href="/category/tv"><img src="https://img.icons8.com/plasticine/100/000000/retro-tv.png" /> Television</a></li>

                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#"><img src="https://img.icons8.com/cotton/64/000000/tie.png" /> Fashion & Clothings <i class="fas fa-angle-right"></i></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/category/shirt"><img src="https://img.icons8.com/cotton/64/000000/forester-shirt.png" /> Shirt</a></li>
                            <li><a tabindex="-1" href="/category/pant"><img src="https://img.icons8.com/plasticine/100/000000/denim-shorts.png" /> Pant</a></li>
                            <li><a tabindex="-1" href="/category/under_garments"><img src="https://img.icons8.com/cotton/64/000000/mens-underwear.png" /> Under Garments </a></li>
                            <li><a tabindex="-1" href="/category/shoe"><img src="https://img.icons8.com/cotton/64/000000/sneakers--v2.png" /> Shoe</a></li>
                            <li><a tabindex="-1" href="/category/fashion_accesories"><img src="https://img.icons8.com/plasticine/100/000000/sun-glasses.png" /> Accesories</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a href="/category/makeup"><img src="https://img.icons8.com/cotton/64/000000/lipstick.png" /> Makeup & Beauty</a>
                        <!-- <a class="test" tabindex="-1" href="#"><img src="https://img.icons8.com/cotton/64/000000/lipstick.png" /> Makeup & Beauty <i class="fas fa-angle-right"></i></a> -->
                        <!-- <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                            <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                            <li class="dropdown-submenu">
                                <a class="test" href="#">Another dropdown <i class="fas fa-angle-right"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">3rd level dropdown</a></li>
                                    <li><a href="#">3rd level dropdown</a></li>
                                </ul>
                            </li>
                        </ul> -->
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#"><img src="https://img.icons8.com/cotton/64/000000/tourist-backpack--v1.png" /> Travelling <i class="fas fa-angle-right"></i></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/category/tent"><img src="https://img.icons8.com/cotton/64/000000/camping-tent.png" /> Tents</a></li>
                            <li><a tabindex="-1" href="/category/climbing_accesories"><img src="https://img.icons8.com/cotton/64/000000/mountain.png" /> Climbing Accesories</a></li>
                            <li><a tabindex="-1" href="/category/journey_accesories"><img src="https://img.icons8.com/cotton/64/000000/paddle.png" /> Extra Journey Accesories</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#"><img src="https://img.icons8.com/cotton/64/000000/pacifier.png" /> Baby & Toys <i class="fas fa-angle-right"></i></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/category/baby_care"><img src="https://img.icons8.com/cotton/64/000000/nappy.png" /> Baby Care</a></li>
                            <li><a tabindex="-1" href="/category/baby_food"><img src="https://img.icons8.com/cotton/64/000000/baby-bottle.png" /> Baby Food</a></li>
                            <li><a tabindex="-1" href="/category/toy"><img src="https://img.icons8.com/cotton/48/000000/teddy-bear.png" />Toys</a></li>
                        </ul>
                    </li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#"><img src="https://img.icons8.com/cotton/64/000000/sport.png" /> Sports <i class="fas fa-angle-right"></i></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="/category/cricket"><img src="https://img.icons8.com/cotton/64/000000/sport-helmet.png" /> Cricket Accesories</a></li>
                            <li><a tabindex="-1" href="/category/football"><img src="https://img.icons8.com/cotton/64/000000/football-ball.png" /> Football Accesories</a></li>
                            <li><a tabindex="-1" href="/category/sport_accesories"><img src="https://img.icons8.com/cotton/64/000000/sport-bottle.png" /> Other Sports Accesories</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="navbar-form navbar-left" id="serch-form">
            <input id="serch" class="search form-control" type="text" placeholder="Type name of the product you are looking for ... ">
        </div>
        <ul class="navbar-nav right-0 log">
            <li class="nav-item p-0">
                <a class="nav-link btn-warning" href="/help">
                    <p> <img src="https://img.icons8.com/cotton/64/000000/hot-line.png" /> 01670820464</p>
                </a>
            </li>
            <li class="nav-item p-0">
                <a class="nav-link btn-warning" href="/help">
                    <p><img src="https://img.icons8.com/cotton/64/000000/customer-support.png" /> Help & More</p>
                </a>
            </li>
            @if(session()->has("user"))
            <li class="nav-item dropdown">
                <a class="nav-link btn-warning " id="navbardrop" data-toggle="dropdown">
                    <p><img src="https://img.icons8.com/cotton/64/000000/guest-male.png" /> {{session()->get("user")["name"]}} <i class="fas fa-angle-down"></i></p>
                </a>
                <ul class="dropdown-menu" style="min-width:100%">
                    <li class="dropdown-submenu">
                        <!-- <a class="dropdown-item btn-warning pl-0" href="#">
                        <p><i class="fas fa-user-cog"></i>My Account</p>
                    </a> -->
                        <a class="dropdown-item pl-0" href="/order_list">
                            <p><img src="https://img.icons8.com/cotton/64/000000/transaction-list--v5.png" /> My Order list</p>
                        </a>
                        <a class="dropdown-item pl-0" href="#">
                            <p><img src="https://img.icons8.com/cotton/64/000000/share.png" /> Link 3</p>
                        </a>
                        <a class="dropdown-item btn-danger pl-0" href="/logout">
                            <p><img src="https://img.icons8.com/cotton/64/000000/shutdown.png" />logout</p>
                        </a>
                    </li>
                </ul>
            </li>
            @else
            <li class="nav-item p-0">
                <a class="nav-link btn-danger" href="/login">
                    <p><img src="https://img.icons8.com/cotton/64/000000/shutdown.png" /> login</p>

                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>
<?php

use App\Http\Controllers\productController;

$search_data  = productController::search_results();
?>
<div class="search-results">
    <h1 class="header">Search Results :</h1>
    <div class="row products">
        @foreach($search_data as $s_data)
        <div class="col-sm-2">
            <div>
                <a href="/detail/{{$s_data['id']}}">
                    <div class="product-img">
                        <img src="{{$s_data['img']}}" width="95%" alt="products images">
                        <div class="product-overlay">
                            <p><i class="fas fa-search-plus"></i>Details</p>
                        </div>
                    </div>
                    <div class="product-details">
                        <hr data-aos-duration="1500" data-aos="zoom-in-right">
                        <p class="ellipsis">{{$s_data['name']}}</p>
                        <h4 class="text-danger font-bold">${{$s_data['price']}}</h4>
                        <p class="d-none">{{$s_data['description']}}</p> <!-- added for fluent searching -->
                    </div>

                </a>
                <a href="/add_to_cart/{{$s_data['id']}}" class="product-cart-btn">
                    <button type="button" class="btn btn-outline-warning"><i class="fas fa-shopping-cart" style="font-size: xx-small;"></i>Add to Cart</button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    <div class="error">
    <img src="https://img.icons8.com/cotton/100/000000/open-box--v1.png"/>
    <h4 class="header">We are sorry, but the product you are looking is out of stock. <br>We will refill it as soon as possible sir.</h4>
    </div>
    <br>
    <hr>
</div>
<div style="height: 52px;">
    <!-- to replace the gap of stiky nav -->
</div>


<script>
    $(document).ready(function() {
        $('.nav-item>.dropdown-menu>.dropdown-submenu a.test').on("click", function(e) {
            $(this).siblings("ul").toggle();
            $(this).parent().siblings("li").children("ul").hide();

            e.stopPropagation();
            e.preventDefault();
        });


    });
</script>
<script>
    $("#serch").on("keyup change", function() {
        if (!$("#serch").val()) {
            $(".search-results").slideUp();
        } else {
            $(".search-results").slideDown();
            document.documentElement.scrollTop = 0;
            document.body.scrollTop = 0;
        }
        var value = $(this).val().toLowerCase();
        $(".search-results .products .col-sm-2").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)            
        });
        // if($(".search-results .products").length===0){
        //         $(".error").html("not");
        //     }else{
        //         $(".error").html("found");
        //     }
    });
    var path = "{{ route('autocomplete') }}";
    $('input.search').typeahead({
        source: function(str, process) {
            return $.get(path, {
                str: str
            }, function(data) {
                return process(data);
            });
        }
    });
</script>