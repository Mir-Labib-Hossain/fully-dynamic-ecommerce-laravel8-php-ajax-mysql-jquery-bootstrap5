@extends("master")
@section("content")
<style>
  .products .col-sm-2 > div {
        height: 280px;
  }
</style>
<h1>searched reasults :</h1>
<div class="row products">
    @foreach($search_data as $s_data)
    <div class="col-sm-2">
        <div>
            <a href="/detail/{{$s_data['id']}}">
                <img src="{{$s_data['img']}}" class="img-fluid d-block m-auto" alt="products images">
                <div class="row">
                    <p class="col-8 ellipsis">{{$s_data['name']}}</p>
                    <p class="col-4 text-warning">${{$s_data['price']}}</p>
                </div>
                <hr>
                <p class="ellipsis-mul">{{$s_data['description']}}</p>
            </a>
        </div>
    </div>
    @endforeach
</div>
<br>
<br>
@endsection