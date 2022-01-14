@extends("master")
@section("content")

<style>
    #help .collapse {
        margin-top:2%;
        margin-bottom: 2%;
    }
    #help li {
        color: black;
        margin-left: 10px;
    }

    #help .header {
        margin-top: 0px !important;
    }

    #help ul li::before {
        content: "\2022";
        display: inline-block;
        width: 1em;
        margin-left: -1em;
        color: #ff686e;
    }

    .help-navbar {
        display: flex;
        justify-content: space-around;
        align-items: center;
        height: 50px;
        padding-top: 7px;
        margin: 0 5%;
        position: fixed;
        width: 90%;
        border-bottom: 2px solid #fdd670;
        background-color: white;
        z-index: 5;
    }

    .help-navbar a {
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: bold;
        color: #ff686e;
    }

    .collapsed {
        color: gray !important;

    }
    .collapse>img{
        display:block;
        margin: 3% auto !important;
    }
    #collapseOne {
        margin: 0 10%;
    }

    #collapseOne p:nth-child(odd) {
        font-weight: bold;
    }

    #collapseOne p:nth-child(even) {
        margin-left: 20px;
        margin-bottom: 30px;
    }

    .ques span {
        color: orange;
    }

    .ans span {
        font-weight: bold;
        color: lightgreen;
    }

    .xx_big {
        padding: 0 !important;
        font-size: 130px;
    }

    #collapseTwo .row .col-sm-4>* {
        margin: auto;
    }

    #collapseTwo .row .col-sm-4:nth-child(1) span,
    #collapseTwo .row .col-sm-4:nth-child(1) ul li::before {
        color: #ff686e;
    }

    #collapseTwo .row .col-sm-4:nth-child(2) span,
    #collapseTwo .row .col-sm-4:nth-child(2) ul li::before {
        color: #fdd670;
    }

    #collapseTwo .row .col-sm-4:nth-child(3) span,
    #collapseTwo .row .col-sm-4:nth-child(3) ul li::before {
        color: lightgreen;
    }

    #collapseTwo .row .col-sm-4.row>span {
        margin: 0 !important;
    }

    @media only screen and (max-width:580px) {

        #collapseTwo .row .col-sm-4.row>* {
            width: auto;
            max-width: 80%;
            float: left;
            display: grid;
            place-content: center;
            margin-left: 0;

        }
    }


    #collapseThree li {
        text-align: center;
        font-size: 20px;
    }

    #collapseThree h4 {
        margin: 30px;
    }
</style>
<div id="help">
    <div id="accordion">
        <div class="help-navbar">
            <a class="" data-toggle="collapse" href="#collapseOne">
                <p>Q&A</p>
            </a>
            <a class=" collapsed" data-toggle="collapse" href="#collapseTwo">
                <p>Work with E-Com</p>
            </a>
            <a class="collapsed" data-toggle="collapse" href="#collapseThree">
                <p>Sell on E-Com</p>
            </a>
        </div>
        <div style="height: 90px;">
            <!-- to replace the gap of stiky nav -->
        </div>
        <div id="collapseOne" class="collapse show" data-parent="#accordion">
            <p class="ques"><span>Q : </span>How much do deliveries cost?</p>
            <p class="ans"><span>Ans : </span>There is a BDT 19 delivery fee if the order value is BDT 400 or more. If the order value is less than BDT 400, we charge BDT 29 delivery fee.</p>
            <p class="ques"><span>Q : </span>How can I contact you?</p>
            <p class="ans"><span>Ans : </span>You can always call 01670820474 or mail us at support@ecom.com. </p>
            <p class="ques"><span>Q : </span>How do I know when my order is here? </p>
            <p class="ans"><span>Ans : </span>A ecom representative will call you as soon as they are at your house to let you know about your delivery. </p>
            <p class="ques"><span>Q : </span>How do I pay? </p>
            <p class="ans"><span>Ans : </span>We accept cash on delivery and we also have Online Credit Card and Online bKash service. Don’t worry, our ecom representatives should always carry enough change.</p>
            <p class="ques"><span>Q : </span>I can’t find the product I am looking for. What do I do? </p>
            <p class="ans"><span>Ans : </span>We are always open to new suggestions and will add an item to our inventory just for you. There is a "Product Request" feature that you can use to inform us of your requirement. You can also call +880-188-1234-567 or mail us at support@ecom.com to add an item to our inventory. </p>
            <p class="ques"><span>Q : </span>My order is wrong. What do I do? </p>
            <p class="ans"><span>Ans : </span> Please Immediately call 01670820474 and let us know the problem. </p>
            <p class="ques"><span>Q : </span>What happens during a hartal? </p>
            <p class="ans"><span>Ans : </span>We work during hartals. That’s how dedicated we are. </p>
        </div>

        <div id="collapseTwo" class="collapse " data-parent="#accordion">
        <img src="https://img.icons8.com/cotton/100/000000/notes-and-coins.png"/>
            <h2 class="header">3 Simple Steps to become a part of US !</h2>
            <div class="row">
                <div class="col-sm-4 row"><span class="xx_big col-md-2">1</span>
                    <div class="col-md-10">
                        <p> Send your CV at <strong>join@ecom.com</strong><br>
                            CV must contain :</p>
                        <ul>
                            <li>Enough Introduction of YourSelf to Judge.</li>
                            <li>Record of Past Experience.</li>
                            <li>Extra Skill Info.</li>
                            <li>Contact Info</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 row"><span class="xx_big col-md-2">2</span>
                    <div class="col-md-10">
                        <p> When You Recieve a Reply or Call from a <strong>E-Com Agent</strong> then You Need to Visit Us for Interview <br>
                            With the Following items: :</p>
                        <ul>
                            <li>A Copy of Voter ID.</li>
                            <li>A Copy of HSC Certificate.</li>
                            <li>2 Passport Size photo of yours.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4 row"><span class="xx_big col-md-2">3</span>
                    <div class="col-md-10">
                        <p> If You are Selected, then Please Collect Your ID Card and From Now You are one of Us <br>
                            <strong style="color: lightgreen;">You Are Welcome !</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="collapseThree" class="collapse " data-parent="#accordion">
        <img src="https://img.icons8.com/cotton/100/000000/receive-cash--v1.png"/>
            <h2 class="header">Make Sure Your Product Full-fills the Given Requirements :</h2>
            <ul>
                <li>100% Authinticate</li>
                <li>Varified</li>
                <li>Official</li>
            </ul>
            <h4 class="header">If Your Product Full-fills our Demands then Contact to <strong>join@ecom.com</strong> or <strong>01670820474</strong>.</h4>
        </div>
    </div>
</div>
@endsection