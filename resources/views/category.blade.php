@extends("master")
@section("content")

<div class="container-fluid">
    <h1 class="header text-left">Category : {{$category_name}}</h1>
    @if (!$category_data->isEmpty())
    <div id="category" class="row products">
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
                        <p class="ellipsis-mul text-secondary">{{$c_data['description']}}</p> <!-- added for fluent searching -->
                    </div>

                </a>
                <a href="/add_to_cart/{{$c_data['id']}}" class="product-cart-btn">
                    <button type="button" class="btn btn-outline-warning"><i class="fas fa-shopping-cart" style="font-size: xx-small;"></i>Add to Cart</button>
                </a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="error">
        <img src="https://img.icons8.com/cotton/100/000000/open-box--v1.png" />
        <h4 class="header">We are sorry, but the product you are looking is out of stock. <br>We will refill it as soon as possible sir.</h4>
    </div>
    @endif
    <br>
</div>
@endsection