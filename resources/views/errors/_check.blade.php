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