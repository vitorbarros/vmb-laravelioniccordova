<div class="form-group">
    {!! Form::label('name','Nome:') !!}
    {!! Form::text('user[name]',null, array('class'=>'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('email','E-mail:') !!}
    {!! Form::text('user[email]',null, array('class'=>'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('phone','Tel:') !!}
    {!! Form::text('phone',null, array('class'=>'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('address','Endereço:') !!}
    {!! Form::textarea('address',null, array('class'=>'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('city','Cidade:') !!}
    {!! Form::text('city',null, array('class'=>'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('state','Estado:') !!}
    {!! Form::text('state',null, array('class'=>'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('zipcode','Cep:') !!}
    {!! Form::text('zipcode',null, array('class'=>'form-control')) !!}
</div>