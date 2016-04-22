@extends('app')
@section('content')
    <div class="container">
        <h3>Novo pedido</h3>
        @include('errors._check')
        {!! Form::open(array('class' => 'form')) !!}
        <div class="form-group">
            <label>Total:</label>
            <p id="total"></p>
            <a href="#" id="btnNewItem" class="btn btn-default">Novo Item</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <select class="form-control" name="items[0][product_id]">
                            @foreach($products as $p)
                                <option value="{{$p->id}}" data-price="{{$p->price}}">
                                    {{$p->name}} --- {{$p->price}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>{!! Form::text('items[0][qtd]',1, array('class' => 'form-control')) !!}</td>
                </tr>
                </tbody>
            </table>
        </div>
        {!! form::close() !!}
    </div>
@endsection

@section('post-script')
    <script>
        $('#btnNewItem').click(function () {
            var row = $('table tbody >tr:last'),
                    newRow = row.clone(),
                    length = $('table tbody tr').length;

            newRow.find('td').each(function () {
                var td = $(this),
                        input = td.find('input,select'),
                        name = input.attr('name');
                input.attr('name', name.replace((length - 1) + "", length + ""));
            });

            newRow.find('input').val(1);
            newRow.insertAfter(row);

        });

//        function calculateTotal()
//        {
//            var total = 0;
//                trLen = $('table tbody tr').length,
//                        tr = null, price, qtd;
//
//            for(var i = 0; i < trLen; i++){
//                tr =
//            }
//        }

    </script>
@endsection