<link rel="stylesheet" href="style.css">
<div class="container" style="height: 100vh; display:grid;place-content:center;">
    <div class="col-sm-12" style="width: 70vw;">
        <form action="/admin" method="get">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Admin name</label>
                <input type="text" name="admin_name" class="form-control" placeholder="name of admin" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <div class="row">
                <div class="form-group col-sm-12">
                    <button type="submit" class="btn btn-warning w-100">Login</button>
                </div>
            </div>
        </form>
        <p class="text-center w-100 text-danger font-bold">{{!empty($output)?$output:""}}</p>

    </div>
</div>