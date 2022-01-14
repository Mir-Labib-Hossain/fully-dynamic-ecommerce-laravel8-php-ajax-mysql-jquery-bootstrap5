@extends("master")
@section("content")
<style>
    @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);



    .rate-form fieldset,
    .rate-form label {
        margin: 0;
        padding: 0;
    }

    .rate-form .rating {
        margin: auto;
        width: 165px;
    }

    .rate-form .myratings {
        font-size: 45px;
        color: green;
    }

    .rate-form .rating>[id^="star"] {
        display: none;
    }

    .rate-form .rating>label:before {
        margin: 5px;
        font-size: 2.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rate-form .rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    .rate-form .rating>label {
        color: #ddd;
        float: right;
    }

    .rate-form .rating>[id^="star"]:checked~label,
    .rate-form .rating:not(:checked)>label:hover,
    .rate-form .rating:not(:checked)>label:hover~label {
        color: #ffd700;
    }

    .rate-form .rating>[id^="star"]:checked+label:hover,
    .rate-form .rating>[id^="star"]:checked~label:hover,
    .rate-form .rating>label:hover~[id^="star"]:checked~label,
    .rate-form .rating>[id^="star"]:checked~label:hover~label {
        color: #ffed85;
    }


    .rate-form {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
    }

    .rate-form .rate-form-body {
        padding: 1rem 1rem;
    }

    .rate-form .rate-form-body {
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .rate-data {
        margin: auto;
    }

    .rate-data .progress {
        margin: 5px 0 !important;
        width: 90%;
    }

    .rate-data p {
        font-weight: bold;
    }

    .rate-data p i {
        margin: 0;
    }

    .img-magnifier-container {
        position: relative;
        overflow: hidden;
    }

    .img-magnifier-glass {
        position: absolute;
        border: 3px solid #ffc108;
        border-radius: 50%;
        cursor: none;
        /*Set the size of the magnifier glass:*/
        width: 200px;
        height: 200px;
    }
   
    #details>.col-md-7{
    height: 70vh!important;
    overflow-y: scroll;
    
}
  
</style>
<p class="font-space">
    <span><a href="/">Home</a></span>
    <span> > </span>
    <span class="text-warning"> {{$data["name"]}}</span>
</p>
<hr>
<div class="row p-5" id="details">
    <div class="col-md-5">
        <div class="img-magnifier-container">
            <img id="myimage" class="img-fluid" src={{$data["img"]}} alt='{{$data["img"]}} image '>
        </div>
    </div>
    <div class="col-md-7 border-warning border-left">
        
            
                <p class="font-bold" style="font-size: 40px!important">{{$data["name"]}}</p>
            
            <p class="text-danger font-bold">
                <i style="font-size: 40px!important">${{$data["price"]}}</i>
</p>
        
        @if($data["avg_rating"]!=0)
        <div class="product-rate">
            <h1 class="header m-0 p-0">{{number_format($data["avg_rating"], 2, '.', '');}}</h1>
            @if($data["avg_rating"]>=1)
            <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star text-warning"></i>
            @endif
            @if($data["avg_rating"]>=2)
            <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star text-warning"></i>
            @endif
            @if($data["avg_rating"]>=3)
            <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star text-warning"></i>
            @endif
            @if($data["avg_rating"]>=4)
            <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star text-warning"></i>
            @endif
            @if($data["avg_rating"]==5)
            <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star text-warning"></i>
            @endif
            @if ((int) $data["avg_rating"] != $data["avg_rating"])
            <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star-half text-warning"></i>
            @endif
            <p> : {{$total_rated}}</p>
            <i class="fas fa-user text-success"></i>
        </div>
        @endif
        <?php
        $total_rated = ($total_rated == 0) ? 1 : $total_rated;
        ?>
        <br>
        <p>Category : {{$data["category"]}}</p>
        <br>
        <div class="btn-group">
            <a href="/add_to_cart/{{$data['id']}}" class="m-0">
                <button type="button" class="btn btn-outline-warning" style="font-size: 17px!important">
                    <i class="fas fa-shopping-cart" style="font-size: 17px!important"></i> Add to Cart
                </button>
            </a>
            <form action="/order" method="post">
                @csrf
                <input type="hidden" value={{$data["price"]}} name="cart_total_price">
                <input type="hidden" value='[{{$data}}]' name="products">
                <button type="submit" class="btn btn-outline-danger" style="font-size: 17px!important">
                    <i class="fas fa-money-bill-alt" style="font-size: 17px!important"></i> Buy Now
                </button>
            </form>
        </div>
        <h3 class="header" style="margin-top: 5%; text-align:left">Details :</h3>
        <hr data-aos-duration="1500" data-aos="zoom-in-right">
        <pre>{{$data["description"]}}</pre>
        <br>
        <br>
        <div>
            <div class="font-bold"><img src="https://img.icons8.com/cotton/44/000000/delivery.png"/><sub style="font-size: 20px;"> Regular Delivery</sub></div>
            <p>Deliveries take up to 3-4 days after you place your order.</p>
        </div>
    </div>
</div>
<hr>
<div class="row p-5">
    <div class="col-sm-9 rate-data">
        <div class="row">
            <div class="col-sm-1 p-0">
                <p>5 <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star text-warning"></i></p>
            </div>
            <div class="col-sm-11 d-flex">
                <div class="progress">
                    <div data-aos="fade-right" data-aos-easing="ease-in-sine" class="progress-bar bg-success" role="progressbar" style="width: {{($star5/$total_rated)*100}}%" aria-valuenow="{{($star5/$total_rated)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="right-0"> {{$star5}} <i class="fas fa-user text-success"></i></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 p-0">
                <p>4 <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star text-warning"></i></p>
            </div>
            <div class="col-sm-11 d-flex">
                <div class="progress">
                    <div data-aos="fade-right" data-aos-easing="ease-in-sine" class="progress-bar bg-success" role="progressbar" style="width: {{($star4/$total_rated)*100}}%" aria-valuenow="{{($star4/$total_rated)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="right-0"> {{$star4}} <i class="fas fa-user text-success"></i></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 p-0">
                <p>3 <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star text-warning"></i></p>
            </div>
            <div class="col-sm-11 d-flex">
                <div class="progress">
                    <div data-aos="fade-right" data-aos-easing="ease-in-sine" class="progress-bar bg-warning" role="progressbar" style="width: {{($star3/$total_rated)*100}}%" aria-valuenow="{{($star3/$total_rated)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="right-0"> {{$star3}} <i class="fas fa-user text-warning"></i></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 p-0">
                <p>2 <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star text-warning"></i></p>
            </div>
            <div class="col-sm-11 d-flex">
                <div class="progress">
                    <div data-aos="fade-right" data-aos-easing="ease-in-sine" class="progress-bar bg-danger" role="progressbar" style="width: {{($star2/$total_rated)*100}}%" aria-valuenow="{{($star2/$total_rated)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="right-0"> {{$star2}} <i class="fas fa-user text-danger"></i></p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 p-0">
                <p>1 <i data-aos="zoom-in" data-aos-duration="1500" class="fas fa-star text-warning"></i></p>
            </div>
            <div class="col-sm-11 d-flex">
                <div class="progress">
                    <div data-aos="fade-right" data-aos-easing="ease-in-sine" class="progress-bar bg-danger" role="progressbar" style="width: {{($star1/$total_rated)*100}}%" aria-valuenow="{{($star1/$total_rated)*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p class="right-0"> {{$star1}} <i class="fas fa-user text-danger text-success"></i></p>
            </div>
        </div>
    </div>

    <div class="col-sm-3 rate-form">
        <div class="rate-form-body text-center">
            <h1 class="myratings">5</h1>
            <h4 class="mt-1">Rate this product / service</h4>
            <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5" />
                <label class="full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" />
                <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" />
                <label class="full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" />
                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1" name="rating" value="1" />
                <label class="full" for="star1" title="Sucks big time - 1 star"></label>
            </fieldset>
            <form action="/rate" method="POST">
                @csrf
                <input type="hidden" value={{$data["id"]}} name="product_id">
                <input type="hidden" class="myratings-inp" name="rating" value="5">
                <button type="submit" class="btn btn-danger font-bold">Submit</button>
            </form>
        </div>
    </div>
</div>
<hr>
<div class="container-fluid ">
    <h1>Related Products :</h1>
    <div class="row products">
        @foreach($category_data as $c_data)
        <div class="col-sm-2">
            <div>
                <a href="/detail/{{$c_data['id']}}">
                    <div class="product-img">
                    <img src="{{$c_data['img']}}" width="95%" alt="products images">
                        <div class="product-overlay">
                            <p><i class="fas fa-search-plus"></i>Details</p>
                        </div>
                    </div>
                    <div class="product-details">
                    <hr data-aos-duration="1500" data-aos="zoom-in-right">
                        <p class="ellipsis">{{$c_data['name']}}</p>
                        <h4 class="text-danger font-bold">${{$c_data['price']}}</h4>
                        <p class="d-none">{{$c_data['description']}}</p> <!-- added for fluent searching -->
                    </div>
                </a>
                <a href="/add_to_cart/{{$c_data['id']}}" class="product-cart-btn">
                    <button type="button" class="btn btn-outline-warning"><i class="fas fa-shopping-cart" style="font-size: xx-small;"></i>Add to Cart</button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<br>
<br>

<script>
    $(document).ready(function() {
        $("input[type='radio']").click(function() {
            var sim = $("input[type='radio']:checked").val();
            //alert(sim);
            if (sim < 3) {
                $(".myratings").css("color", "tomato");
                $(".myratings").text(sim);
                $(".myratings-inp").val(sim);
            } else if (sim < 4) {
                $(".myratings").css("color", "#fdd670");
                $(".myratings").text(sim);
                $(".myratings-inp").val(sim);
            } else {
                $(".myratings").css("color", "#28A745");
                $(".myratings").text(sim);
                $(".myratings-inp").val(sim);
            }
        });
    });

    function magnify(imgID, zoom) {
        var img, glass, w, h, bw;
        img = document.getElementById(imgID);
        /*create magnifier glass:*/
        glass = document.createElement("DIV");
        glass.setAttribute("class", "img-magnifier-glass");
        /*insert magnifier glass:*/
        img.parentElement.insertBefore(glass, img);
        /*set background properties for the magnifier glass:*/
        glass.style.backgroundImage = "url('" + img.src + "')";
        glass.style.backgroundRepeat = "no-repeat";
        glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
        bw = 3;
        w = glass.offsetWidth / 2;
        h = glass.offsetHeight / 2;
        /*execute a function when someone moves the magnifier glass over the image:*/
        glass.addEventListener("mousemove", moveMagnifier);
        img.addEventListener("mousemove", moveMagnifier);
        /*and also for touch screens:*/
        glass.addEventListener("touchmove", moveMagnifier);
        img.addEventListener("touchmove", moveMagnifier);

        function moveMagnifier(e) {
            var pos, x, y;
            /*prevent any other actions that may occur when moving over the image*/
            e.preventDefault();
            /*get the cursor's x and y positions:*/
            pos = getCursorPos(e);
            x = pos.x;
            y = pos.y;
            /*prevent the magnifier glass from being positioned outside the image:*/
            if (x > img.width - (w / zoom)) {
                x = img.width - (w / zoom);
            }
            if (x < w / zoom) {
                x = w / zoom;
            }
            if (y > img.height - (h / zoom)) {
                y = img.height - (h / zoom);
            }
            if (y < h / zoom) {
                y = h / zoom;
            }
            /*set the position of the magnifier glass:*/
            glass.style.left = (x - w) + "px";
            glass.style.top = (y - h) + "px";
            /*display what the magnifier glass "sees":*/
            glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
        }

        function getCursorPos(e) {
            var a, x = 0,
                y = 0;
            e = e || window.event;
            /*get the x and y positions of the image:*/
            a = img.getBoundingClientRect();
            /*calculate the cursor's x and y coordinates, relative to the image:*/
            x = e.pageX - a.left;
            y = e.pageY - a.top;
            /*consider any page scrolling:*/
            x = x - window.pageXOffset;
            y = y - window.pageYOffset;
            return {
                x: x,
                y: y
            };
        }
    }
</script>
<script>
    magnify("myimage", 3);
</script>
@endsection