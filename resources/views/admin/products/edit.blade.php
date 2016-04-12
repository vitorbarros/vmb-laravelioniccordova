@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Editando produto: <b>{{ $product->name }}</b></h3>
            </div>
        </div>

        @include('errors._check')

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                {!! Form::model($product, array('route' => array('admin.products.update',$product->id))) !!}

                @include('admin.products._form')

                <div class="form-group">
                    {!! Form::submit('Salvar produto', array('class'=>'btn btn-primary')) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection