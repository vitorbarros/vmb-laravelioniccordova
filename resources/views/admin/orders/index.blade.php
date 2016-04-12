@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Pedidos</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Total</th>
                        <th>Data</th>
                        <th>Itens</th>
                        <th>Entregador</th>
                        <th>Status</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ $order->id }}</td>
                            <td>R$ {{ $order->total }}</td>
                            <td>{{ $order->created_at }}</td>

                            <td>
                                <ul>
                                @foreach($order->items as $item)
                                    <li class="list">{{ $item->product->name }}</li>
                                @endforeach
                                </ul>
                            </td>
                            @if($order->deliverymen)
                                <td>{{$order->deliverymen->name}}</td>
                            @else
                                <td>--</td>
                            @endif
                            <td>{{ $order->status }}</td>
                            <td><a href="{{route('admin.orders.edit',array('id' => $order->id))}}" class="btn btn-default">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {!! $orders->render() !!}
            </div>
        </div>
    </div>
@endsection