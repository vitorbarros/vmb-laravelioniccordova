<div class="form-group">
    {!! Form::label('category','Categoria:') !!}
    {!! Form::select('category_id',$categories,null , array('class'=>'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('name','Nome:') !!}
    {!! Form::text('name',null, array('class'=>'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('description','Descrição:') !!}
    {!! Form::textarea('description',null, array('class'=>'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('price','Preço:') !!}
    {!! Form::text('price',null, array('class'=>'form-control')) !!}
</div>