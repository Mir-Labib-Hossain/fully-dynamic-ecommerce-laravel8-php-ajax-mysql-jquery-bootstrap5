<link rel="stylesheet" href="{{asset('style.css') }}">

<form class="row p-5" action="/add" method="post">
    @csrf
    <div class="col-md-5">
        <p>Image link : <input type="text" name="img" id="img_input" style="width:80%" placeholder="Image link"></p>
        <img id="img" class="img-fluid" src='https://media.istockphoto.com/vectors/image-preview-icon-picture-placeholder-for-website-or-uiux-design-vector-id1222357475?k=6&m=1222357475&s=612x612&w=0&h=p8Qv0TLeMRxaES5FNfb09jK3QkJrttINH2ogIBXZg-c=' alt="No Image Found On The Given Link !!">
    </div>
    <div class="col-md-7 border-warning border-left position-relative">
        <div class="row">
            <div class="col-sm-8 p-0">
                <h1><input type="text" name="name" placeholder="Product Name"></h1>
            </div>
            <div class="col-sm-4 text-right text-warning d-flex">
                <h1 style="padding: 10px 0;">$ </h1>
                <h1><input class="w-100" type="text" name="price" placeholder="Price"></h1>
            </div>
        </div>
        <p>Category : <input type="text" name="category" placeholder="Category"></p>
        <p>Sub Category 1: <input type="text" name="sub_category_1" placeholder="Sub Category 1"></p>
        <p>Sub Category 2: <input type="text" name="sub_category_2" placeholder="Sub Category 2"></p>
        <p>Description :</p>
        <textarea class="w-100" name="description" cols="100%" rows="5" placeholder="Description"></textarea>
        <br>

        <br><br>
        <button type="submit" class="btn btn-warning w-100 font-bold"><p> Add</p></button>
        <br><br>
        <a href="/admin" class="btn btn-danger w-100 font-bold"><p> Close</p></a>

    </div>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#img_input").keyup(function() {
            $('#img').attr('src', $("#img_input").val());
        });
    });
    
</script>