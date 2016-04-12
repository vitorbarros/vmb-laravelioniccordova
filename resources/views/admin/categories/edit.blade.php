@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Editando categoria: <b>{{ $category->name }}</b></h3>
            </div>
        </div>

        @include('errors._check')

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                {!! Form::model($category, array('route' => array('admin.categories.update',$category->id))) !!}

                @include('admin.categories._form')

                <div class="form-group">
                    {!! Form::submit('Salvar categoria', array('class'=>'btn btn-primary')) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection