@extends("master")
@section("content")
<style>
    .inner-container {
        border: 2px solid #FFC107;
        border-radius: 10px;
        margin: 20px;
        overflow: hidden;
    }

    .table {
        margin: 0 !important;
    }


    h4 {
        margin-left: 10px;
    }
</style>
<div class="container">
    <?php $i = 0; ?>

    @foreach($order_list as $ol)
    <div class="inner-container bg-white">
        <h4> Ordered time : {{$ol->created_at}}</h4>
        <div class="table-responsive">
            <table class="table table-dark table-borderless table-nostriped text-center">
                <tr>
                    <th>
                        <p>Payment method</p>
                    </th>
                    <th>
                        <p>Payment status</p>
                    </th>
                    <th>
                        <p>Products</p>
                    </th>
                    <th>
                        <p>Address</p>
                    </th>
                    <th>
                        <p>Delivery status</p>
                    </th>
                    <th>
                        <p>Total cost</p>
                    </th>

                </tr>
                <tr>
                    <td>
                        <p>{{$ol->payment_method}}</p>
                    </td>
                    <td>
                        <p>{{$ol->payment_status}}</p>
                    </td>

                    <td>
                        <table class="table table-hover table-dark table-striped bg-dark">
                            <tr>
                                <th>
                                    <p>Name</p>
                                </th>
                                <th>
                                    <p>Quantity</p>
                                </th>
                            </tr>
                            @foreach($order_list[$i]->products as $p)
                            <tr>
                                <td>
                                    <p>{{$p->name}}</p>
                                </td>
                                <td class="text-center">
                                    <p>{{isset($p->total)?$p->total:1}}</p>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                    <td>
                        <p>{{$ol->address}}</p>
                    </td>
                    <td>
                        <p>{{$ol->delivery_status}}</p>
                    </td>
                    <td class="text-center">
                        <p> ${{$ol->total_cost}}</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php $i++; ?>
    @endforeach
</div>

@endsection