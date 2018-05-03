@extends('master')
@Section('content')
<a href= {{ route('weeklyList.index') }} class="btn btn-primary" align="center">Home</a><br>
@if(session('message'))
 <div class="alert alert-success">
         {{ session('message') }}        </div> 
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
<div class="col-md-12">
    {{ Form::open(array('url' => 'weeklyList')) }}
        
        {{ Form::hidden('email',session()->get('email')) }}
        
        <div class="col-md-12 col">
            <div class = "col-md-4 col-md-offset-1">
                <div class = "form-group-row" >
                        
                    {{ Form::label('startDate','Start Date') }}
                    {{ Form::text('startDate',null,['class' => 'form-control js-date']) }}
                
                </div>
            </div>
            <div class = "col-md-4 col-md-offset-2">
                <div class = "form-group-row" >
                        
                    {{ Form::label('endDate','End Date') }}
                    {{ Form::text('endDate',null,['class' => 'form-control js-date']) }}
                
                </div>
            </div>         
        </div>
        <div class = "col-md-6" style="border:1px;">
            <div class = "form-group">
                {{ Form::label('priorities','Priorities') }}
                {{ Form::textarea('priorities',null,['class' => 'form-control']) }}
            </div>
        </div>
                
        <div class = "col-md-6" style="border:1px;">
            <div class = "form-group">
                {{ Form::label('accomplishments','Accomplishments') }}
                {{ Form::textarea('accomplishments',null,['class' => 'form-control']) }}
            </div>
        </div>
        </div>
        <div class = "form-group" align="center">
            {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
        </div>
    {{ Form:: close() }}

</div>

<script>
$('.js-date').each(function(){
        
        $(this).datepicker();
    }); 
</script>
@endSection
