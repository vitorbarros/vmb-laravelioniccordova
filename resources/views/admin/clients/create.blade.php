@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Novo cliente</h3>
            </div>
        </div>

        @include('errors._check')

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                {!! Form::open(array('route' => 'admin.clients.store')) !!}

                @include('admin.clients._form')

                <div class="form-group">
                    {!! Form::submit('Criar cliente', array('class'=>'btn btn-primary')) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection