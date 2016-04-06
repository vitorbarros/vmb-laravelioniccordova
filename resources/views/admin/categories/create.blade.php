@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Nova Categoria</h3>
            </div>
        </div>

        @if($errors->any())
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="alert">
                        @foreach($errors->all() as $erro)
                            <li>{{ $erro }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                {!! Form::open(array('route' => 'admin.categories.store')) !!}

                <div class="form-group">
                    {!! Form::label('name','Nome:') !!}
                    {!! Form::text('name',null, array('class'=>'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Criar categoria', array('class'=>'btn btn-primary')) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection