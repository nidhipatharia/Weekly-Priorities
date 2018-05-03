@extends('master')
@Section('content')
<a href={{ route('weeklyList.index') }} class="btn btn-primary" align="center">Home</a>
@if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
** Start new Priority and/Accomplishment with @@
{{ Form::model($list,['route' => ['weeklyList.update', $list->id], 'method' => 'PUT'])}}
	
    {{ Form::hidden('email',session()->get('email')) }}
	 <div class="col-md-12 col">
            <div class = "col-md-4 col-md-offset-1">
                <div class = "form-group-row" >
                        
                    {{ Form::label('startDate','Start Date') }}
                    {{ Form::text('startDate',$list->startDate,['class' => 'form-control js-date']) }}
                
                </div>
            </div>
            <div class = "col-md-4 col-md-offset-2">
                <div class = "form-group-row" >
                        
                    {{ Form::label('endDate','End Date') }}
                    {{ Form::text('endDate',$list->endDate,['class' => 'form-control js-date']) }}
                
                </div>
            </div>         
        </div>
        <div class = "col-md-6" style="border:1px;">
            <div class = "form-group">
                {{ Form::label('priorities','Priorities') }}
                {{ Form::textarea('priorities',$list->priorities,['class' => 'form-control']) }}
            </div>
        </div>
                
        <div class = "col-md-6" style="border:1px;">
            <div class = "form-group">
                {{ Form::label('accomplishments','Accomplishments') }}
                {{ Form::textarea('accomplishments',$list->accomplishments,['class' => 'form-control']) }}
            </div>
        </div>
        </div>
        <div class = "form-group" align="center">
            {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
        </div>

{{ Form::close() }}
<script>
$('.js-date').each(function(){
        
        $(this).datepicker();
    }); 
</script>
@endSection