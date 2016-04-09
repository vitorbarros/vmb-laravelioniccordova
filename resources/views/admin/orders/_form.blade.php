<div class="form-group">
    {!! Form::label('status','Status:') !!}
    {!! Form::select('status',$listStatus,null , array('class'=>'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('deliverymen','Entregador:') !!}
    {!! Form::select('user_deliverymen_id',$deliveryMan,null , array('class'=>'form-control')) !!}
</div>