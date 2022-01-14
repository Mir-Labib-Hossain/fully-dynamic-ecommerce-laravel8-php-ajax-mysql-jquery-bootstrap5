<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
    * {
        margin: 0;
        padding: 0
    }

    body {
        overflow-x: hidden;
        background: #000000
    }

    #bg-div {
        margin: 0;
    }

    #border-btm {
        padding-bottom: 20px;
        margin-bottom: 0px;
        box-shadow: 0px 35px 2px -35px lightgray
    }

    #test {
        margin-top: 0px;
        margin-bottom: 40px;
        border-radius: 0.25rem;
        width: 60px;
        height: 30px;
        background-color: #FFECB3
    }

    .active1 {
        color: #FFC107 !important;
        font-weight: bold
    }

    .bar4 {
        width: 35px;
        height: 5px;
        background-color: #ffffff;
        margin: 6px 0
    }

    .list-group .tabs {
        color: #000000;
        font-size: 15px!important;
    }

    #menu-toggle {
        height: 50px;
        background-color: #2C3E50;
    }

    #new-label {
        padding: 2px;
        font-size: 10px;
        font-weight: bold;
        background-color: red;
        color: #ffffff;
        border-radius: 5px;
        margin-left: 5px
    }

    #sidebar-wrapper {
        min-height: 100%;
        margin-left: -15rem;
        -webkit-transition: margin .25s ease-out;
        -moz-transition: margin .25s ease-out;
        -o-transition: margin .25s ease-out;
        transition: margin .25s ease-out
    }

    #sidebar-wrapper .sidebar-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem
    }

    #sidebar-wrapper .list-group {
        width: 15rem
    }

    #page-content-wrapper {
        min-width: 100vw;
        padding-left: 20px;
        padding-right: 20px
    }

    #wrapper {
        height: 550px;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: 0
    }

    .list-group-item.active {
        z-index: 2;
        color: #fff;
        background-color: #fff !important;
        border-color: #fff !important
    }

    @media (min-width: 768px) {
        #sidebar-wrapper {
            margin-left: 0
        }

        #page-content-wrapper {
            min-width: 0;
            width: 100%
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
            display: none
        }
    }


    .top-highlight {
        color: #FFC107;
        font-weight: bold;
        font-size: 20px
    }

    .form-card input,
    .form-card textarea {
        padding: 10px 15px 5px 15px;
        border-radius: 6px;
        margin-bottom: 25px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        color: #2C3E50;
        font-size: 14px;
        letter-spacing: 1px
    }

    .form-card input:focus,
    .form-card textarea:focus {
        -moz-box-shadow: 0px 0px 0px 1.5px skyblue !important;
        -webkit-box-shadow: 0px 0px 0px 1.5px skyblue !important;
        box-shadow: 0px 0px 0px 1.5px skyblue !important;
        font-weight: bold;
        border: 1px solid skyblue;
        outline-width: 0
    }

    input.btn-outline-warning {
        height: 50px;
        color: #ffffff;
        opacity: 0.9;
    }

    #below-btn a {
        font-weight: bold;
        color: #000000
    }

    .input-group {
        position: relative;
        width: 100%;
        overflow: hidden
    }

    .input-group input {
        position: relative;
        height: 70px;
        margin-left: 1px;
        margin-right: 1px;
        border-radius: 6px;
        padding-top: 30px;
        padding-left: 25px;
        border: 2px solid lightgrey;

    }

    .input-btn {
        height: 50px;
        margin-left: 1px;
        margin-right: 1px;
        border-radius: 6px;
        padding-top: 30px;
        padding-left: 25px;
        font-size: 13px !important;
        font-weight: bold !important;
    }

    .input-group label {
        position: absolute;
        height: 24px;
        background: none;
        border-radius: 6px;
        line-height: 48px;
        font-size: 15px;
        color: gray;
        width: 100%;
        font-weight: 100;
        padding-left: 25px
    }

    input:focus+label {
        color: #1E88E5
    }

    #qr {
        margin-bottom: 150px;
        margin-top: 50px
    }

    .table {
        font-size: 10px;
        width: 205 !important;
        padding: 0 5px !important;
    }

    td {
        margin: 0 10px;
    }
</style>
<?php $total_cost = 200 + ((5 / 100) * $total_price) + $total_price; ?>
@extends("master")
@section("content")
<div class="container-fluid px-0" id="bg-div">
    <div class="row justify-content-center">
        <div class="col-12 p-0">
                <div class="d-flex w-100" id="wrapper">
                    <!-- Sidebar -->
                    <div class="bg-light border-right" id="sidebar-wrapper">
                        <div class="sidebar-heading pt-5 pb-4"><strong>PAY WITH</strong></div>
                        <div class="list-group list-group-flush">
                            <a data-toggle="tab" href="#menu1" id="tab1" class="tabs list-group-item bg-light">
                                <div class="list-div my-2">
                                    <div class="fa fa-home"></div> Bank
                                </div>
                            </a> <a data-toggle="tab" href="#menu2" id="tab2" class="tabs list-group-item active1">
                                <div class="list-div my-2">
                                    <div class="fa fa-credit-card"></div> Card
                                </div>
                            </a> <a data-toggle="tab" href="#menu3" id="tab3" class="tabs list-group-item bg-light">
                                <div class="list-div my-2">
                                    <div class="fa fa-qrcode"></div> &nbsp; Bkash <span id="new-label">NEW</span>
                                </div>
                            </a> </div>
                    </div> <!-- Page Content -->
                    <div id="page-content-wrapper">
                        <div class="row pt-3" id="border-btm">
                            <div class="col-4"> <button class="btn btn-outline-warning mt-4 ml-3 mb-3" id="menu-toggle">
                                    <div class=" bar4"></div>
                                    <div class="bar4"></div>
                                    <div class="bar4"></div>
                                </button>
                            </div>
                            <div class="col-8">
                                <div class="row justify-content-right">
                                    <div class="col-12">
                                        <p class="mb-0 mr-4 mt-4 text-right">{{session()->get("user")["email"]}}</p>
                                    </div>
                                </div>
                                <div class="row justify-content-right">
                                    <div class="col-12">
                                        <div class="dropdown float-right">
                                            <p class="nav-link dropdown-toggle" id="navbardrop" data-toggle="dropdown">
                                                Total cost :<span class="top-highlight">${{$total_cost}}</span>
                                            </p>
                                            <table class="dropdown-menu table thead-warning">
                                                <tr>
                                                    <td>
                                                        <p>Ammount</p>
                                                    </td>
                                                    <td>
                                                        <p>: ${{$total_price}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Tax</p>
                                                    </td>
                                                    <td>
                                                        <p>: 5%</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <p>Delivery charge</p>
                                                    </td>
                                                    <td>
                                                        <p>: $200</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <div class="form-card">
                                            <h3 class="mt-0 mb-4 text-center">Enter bank details to pay
                                            </h3>
                                            <form action="/ordered" method="POST">
                                                @csrf
                                                <input type="hidden" name="payment_method" value="Bank">
                                                <input type="hidden" name="products" value="{{$products}}">
                                                <input type="hidden" name="total_cost" value="{{$total_cost}}">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group">
                                                            <input type="text" id="bk_nm" placeholder="BBB Bank">
                                                            <label>BANK NAME</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group">
                                                            <input type="text" name="ben_nm" id="ben-nm" placeholder="username">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group">
                                                            <input type="text" name="address" placeholder="Delivery Location (Address)" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-warning placeicon col-md-12 input-btn">Pay
                                                    ${{$total_cost}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane in active">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <div class="form-card">
                                            <h3 class="mt-0 mb-4 text-center">Enter your card details to pay </h3>
                                            <form action="/ordered" method="POST">
                                                @csrf
                                                <input type="hidden" name="payment_method" value="Card">
                                                <input type="hidden" name="products" value="{{$products}}">
                                                <input type="hidden" name="total_cost" value="{{$total_cost}}">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group">
                                                            <input type="text" id="cr_no" placeholder="0000 0000 0000 0000" minlength="19" maxlength="19"> <label>CARD NUMBER</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="input-group">
                                                            <input type="text" name="expire" id="exp" placeholder="MM/YY" minlength="5" maxlength="5">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="input-group">
                                                            <input type="password" name="password" placeholder="Password" class="placeicon" minlength="3" maxlength="3">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="input-group">
                                                            <input type="text" name="address" placeholder="Delivery Location (Address)" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-warning placeicon col-md-12 input-btn">Pay
                                                    ${{$total_cost}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <h3 class="mt-0 mb-4 text-center">Scan the QR code to pay</h3>
                                        <div class="row justify-content-center">
                                            <div id="qr">
                                                <img src="https://www.icreative.com.bd/wp-content/uploads/2021/05/bKash-Payment-1024x1024.png" width="200px" height="200px">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
<script>
    $(document).ready(function() {
        //Menu Toggle Script
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        // For highlighting activated tabs
        $("#tab1").click(function() {
            $(".tabs").removeClass("active1");
            $(".tabs").addClass("bg-light");
            $("#tab1").addClass("active1");
            $("#tab1").removeClass("bg-light");
        });
        $("#tab2").click(function() {
            $(".tabs").removeClass("active1");
            $(".tabs").addClass("bg-light");
            $("#tab2").addClass("active1");
            $("#tab2").removeClass("bg-light");
        });
        $("#tab3").click(function() {
            $(".tabs").removeClass("active1");
            $(".tabs").addClass("bg-light");
            $("#tab3").addClass("active1");
            $("#tab3").removeClass("bg-light");
        });
    })
</script>