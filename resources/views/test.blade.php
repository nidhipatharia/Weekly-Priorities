{{ Form::open(array('method' => 'post','url' => 'testpost')) }}
<div class="col-md-4 col-offset-2">
    {!! csrf_field() !!}
       
    </div>
<div class="col-md-2 col-offset-2">
        {{ Form::selectRange('year',2016, Carbon\Carbon::now()->year,null,['class' => 'form-control', 'placeholder' => 'Select an Year']) }}
    </div>
<div class="col-md-2 col-offset-2">
    {{ Form::selectRange('month',01, 12 ,null,['class' => 'form-control', 'placeholder' => 'Select a Month']) }}
</div>
<div class="col-md-4">
    {{  Form::submit('Filter', ['class' => 'btn btn-primary']) }}
</div>
<br>
{{ Form::close() }}