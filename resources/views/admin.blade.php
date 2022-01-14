<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
<style>
    .products .col-sm-2>div {
        height: 240px;
    }

    .admin-nav-item {
        padding: 10px !important;
        width: 100% !important;
        margin: 0 !important;
    }

    a.admin-nav-item {
        padding-top: 10px !important;
        color: white;
        font-weight: bold;
        font-size: 13px;
    }

    .header {
        margin: 5%;
    }
</style>
<div class="row bg-warning d-flex m-0">
    <a class="admin-nav-item col-sm-1 btn btn-warning" href="/">E-Com</a>
    <form class="admin-nav-item col-sm-10" action="/search">
        <input id="serch_post" type="text" class="form-control w-100" placeholder="Type here to search..." />
    </form>
    <a class="admin-nav-item col-sm-1 btn btn-danger" href="/admin_logout">logout</a>
</div>
<div class="container-fluid">
    <h1 class="header">Action : </h1>
    <div class="row products">
        <div class="col-sm-2">
            <div class="text-center">
                <a href="/add_page">
                    <br>
                    <i class="fas fa-plus-circle" style="font-size: 10vw!important; color:#ffc107;"></i>
                    <hr>
                    <h4>Add Product</h4>
                </a>
            </div>
        </div>
        @foreach($products as $p_data)
        <div class="col-sm-2">
            <div>
                <img src="{{$p_data['img']}}" class="img-fluid d-block m-auto" alt="products images">
                <div class="row">
                    <p class="col-8 ellipsis">{{$p_data['name']}}</p>
                    <p class="col-4 text-danger">${{$p_data['price']}}</p>
                    <p class="d-none">{{$p_data['description']}}</p> <!-- added for fluent searching -->
                </div>
                <hr>
                <div class="d-flex" style="margin:0 10px;">
                    <form action="/edit" method="post" style='padding: 0 !important;'> @csrf
                        <input type="hidden" value="{{$p_data['id']}}" name="id">
                        <button type="submit" class="m-0;p-0" style='margin: 0 !important;'> <i class="fas fa-edit text-primary"></i></button>
                    </form>
                    <form action="/edit" method="post" style='padding: 0 !important;width:100%; text-align:right'> @csrf
                        <input type="hidden" value="{{$p_data['id']}}" name="id">
                        <button type="submit" class="m-0;p-0" style='margin: 0 !important;'> <i class="fas fa-trash text-danger"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>

</div>
<script>
    $("#serch_post").on("keyup", function() {
        console.log("up");
        var value = $(this).val().toLowerCase();
        $(".products .col-sm-2").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
</script>