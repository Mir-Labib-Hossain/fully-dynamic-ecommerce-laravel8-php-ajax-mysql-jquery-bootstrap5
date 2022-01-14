<link rel="stylesheet" href="{{asset('style.css') }}">

<form class="row p-5" action="/update" method="post">
@csrf
<input type="hidden" name="id" value='{{$data["id"]}}'>
    <div class="col-md-5">
        <p>Image link : <input id="img_input" type="text" name="img" value='{{$data["img"]}}' style="width:80%"></p>
        <img  id="img" class="img-fluid" src='{{$data["img"]}}' alt='{{$data["img"]}} image '>
    </div>
    <div class="col-md-7 border-warning border-left position-relative">
        <div class="row">
            <div class="col-sm-8 p-0">
                <h1><input type="text" name="name" value='{{$data["name"]}}'></h1>
            </div>
            <div class="col-sm-4 text-right text-warning d-flex">
                <h1 style="padding: 10px 0;">$ </h1>
                <h1><input class="w-100"  type="text" name="price" value='{{$data["price"]}}'></h1>
            </div>
        </div>
        <p>Category : <input type="text" name="category" value='{{$data["category"]}}'></p>
        <p>Sub Category 1: <input type="text" name="sub_category_1" value='{{$data["sub_category_1"]}}'></p>
        <p>Sub Category 2: <input type="text" name="sub_category_2" value='{{$data["sub_category_2"]}}'></p>
        <p>Description :</p>
        <textarea class="w-100" style="font-size:large" name="description" cols="100%" rows="5">{{$data["description"]}}</textarea>
        <br>

        <br><br>
        <button type="submit" class="btn btn-warning w-100"><p class="font-bold m-auto"> Update</p></button>
        <br><br>
        <a href="/admin" class="btn btn-danger w-100"> <p class="font-bold m-auto">Close</p></a>

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
