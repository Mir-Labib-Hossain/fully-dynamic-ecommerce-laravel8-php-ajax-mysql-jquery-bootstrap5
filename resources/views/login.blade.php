@extends("master")
@section("content")
<style>
#register {
    display: none;
}
</style>
<p class="font-space">
    <span><a href="/">Home</a></span>
    <span> > </span>
    <span class="text-warning"> login</span>
</p>
<hr>
<div class="custom-login-container bg-white p-0" style="height: auto; margin:50px">
    <div class="row">
        <div class="col-sm-12" id="login">
            <form action="login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1"><p>Email address</p> </label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1"><p>Password</p> </label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password" required>
                </div>
                <div class="row">
                    <div class="form-group col-sm-8 p-0">
                        <button type="submit" class="btn btn-warning w-100 font-bold" style="font-size: 13px;">Login</button>
                    </div>
                    <div class="form-group col-sm-3 p-0 ml-auto">
                        <p class="btn btn-danger serch-form w-100 font-bold">Register</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-12" id="register">
            <form action="register" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1"><p>Username</p></label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1"><p>Email address</p></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter email" required>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6 pl-0">
                        <label for="exampleInputPassword1"><p>Password</p></label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                            placeholder="Password" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="exampleInputPassword1"><p>Confirm Password</p> </label>
                        <input type="password" name="confirm_password" class="form-control" id="exampleInputPassword1"
                            placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-8  p-0">
                        <button type="submit" class="btn btn-danger w-100 font-bold" style="font-size: 13px;">Register</button>
                    </div>
                    <div class="form-group col-sm-3 ml-auto">
                        <p class="btn btn-warning serch-form w-100 font-bold">Login</p>
                    </div>
                </div>
            </form>
        </div>
        <p class="text-center w-100 text-danger font-bold">{{!empty($output)?$output:" "}}</p>
    </div>
</div>
<script>
$(document).ready(function() {
    $(".serch-form").click(function() {
        $("#register").toggle("slow");
        $("#login").toggle("slow");
    });
});
</script>
@endsection
