@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3>Cupoms</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <a href="{{ route('admin.cupoms.create') }}" class="btn btn-default">Novo cupom</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código</th>
                        <th>Valor</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cupoms as $cupom)
                        <tr>
                            <td>{{ $cupom->id }}</td>
                            <td>{{ $cupom->code }}</td>
                            <td>{{ $cupom->value }}</td>
                            <td>--</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {!! $cupoms->render() !!}
            </div>
        </div>
    </div>
@endsection