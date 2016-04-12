@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Pedido: #<b>{{ $order->id }}</b> - Total <b>R$ {{ $order->total }}</b></h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4>Data: <b>{{ $order->created_at }}</b></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h4>Cliente: <b>{{ $order->client->user->name }}</b></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>Entregar em: <b>{{ $order->client->address }} - {{ $order->client->city }} - {{ $order->client->state }}</b></p>
            </div>
        </div>

        @include('errors._check')

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                {!! Form::model($order, array('route' => array('admin.orders.update',$order->id))) !!}

                @include('admin.orders._form')

                <div class="form-group">
                    {!! Form::submit('Salvar pedido', array('class'=>'btn btn-primary')) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection