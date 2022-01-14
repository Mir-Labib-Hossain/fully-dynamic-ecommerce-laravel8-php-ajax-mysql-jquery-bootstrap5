<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="{{asset('style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>

<body>
    <?php

    use App\Http\Controllers\productController;

    if (session()->has("user")) {
        $cart_total  = productController::cart_items()[0];
        $cart_item  = productController::cart_items()[1];
        $cart_total_price  = productController::cart_items()[2][0]->total_price;
    } else {
        $cart_total = 0;
        $cart_item  = new stdClass();
        $cart_total_price = 0;
    }
    ?>
    <div class="dropdown dropleft cart-btn">
        <a class="nav-link {{$cart_total!=0?'dropdown-toggle':''}}" href="#" id="navbardrop" data-toggle="dropdown">
            <sub><img src="https://img.icons8.com/plasticine/100/000000/shopping-cart.png" width="30px"/></sub><sup data-aos="zoom-out" data-aos-duration="3000" class="label label-danger" style="font-size: 10px;">{{$cart_total}}</sup>
        </a>
        @if( $cart_total!=0)
        <table class="dropdown-menu cart table thead-dark">
            <tr>
                <th colspan="2">
                    <p>Item</p>
                </th>

                <th>
                    <p>Price</p>
                </th>
                <th class="text-center">
                    <p>Action</p>
                </th>
            </tr>
            @foreach($cart_item as $ci)
            <tr>
                <td>
                    <img src={{$ci->img}} alt="">
                </td>
                <td>
                    <p class="product-name">{{$ci->name}}</p>
                </td>
                <td>
                    <p>${{$ci->price * $ci->total}}</p>
                </td>
                <td class="d-flex justify-content-around">
                    <a href="/remove_from_cart/{{$ci->id}}">
                        <p><span class="glyphicon glyphicon-small glyphicon-minus text-danger"></span></p>
                    </a>
                    <p>{{$ci->total}}</p>
                    <a href="/add_to_cart/{{$ci->id}}">
                        <p><span class="glyphicon glyphicon-small glyphicon-plus text-warning"></span></p>
                    </a>
                </td>
            </tr>
            @endforeach
            <tr>
                <th colspan="2">
                    <p>Total</p>
                </th>
                <td>
                    <p>${{$cart_total_price}}</p>
                </td>
                <td class="text-center">
                    <form action="/order" method="post">
                        @csrf
                        <input type="hidden" value={{$cart_total_price}} name="cart_total_price">
                        <input type="hidden" value='{{$cart_item}}' name="products">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <p>Buy</p>
                        </button>
                    </form>
                </td>
            </tr>
        </table>
        @endif
    </div>
    {{View::make("header")}}
    @yield("content")
    {{View::make("footer")}}
</body>

</html>
<script>
    AOS.init();
    var width = $(document).width();
        $(".p").html(width);


    $(window).on('load resize', function() {
        var width = $(window).width();
        $(".p").html(width);

        //do something
        var width = $(document).width();
        if (width < 800 && width > 558) {
            $(".product-cart-btn>.btn").html('<i class="fas fa-shopping-cart" style="font-size: xx-small;"></i>');
            $(".product-overlay").html('<p><i class="fas fa-search-plus"></i></p>');
        } else if (width > 800 || width < 558) {
            $(".product-cart-btn>.btn").html('<i class="fas fa-shopping-cart" style="font-size: xx-small;"></i>Add to Cart');
            $(".product-overlay").html('<p><i class="fas fa-search-plus"></i>Details</p>');
        }
    });
</script>