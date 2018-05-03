@extends('master')
@Section('content')
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
<div class="col-md-12">
    <form method="POST" action="../weeklyList">
        {!! csrf_field() !!}
        <input type="hidden" name="email" id="email" value="{{ session()->get('email') }}">
        <div class="col-md-12 col">
            <div class = "col-md-4 col-md-offset-1">
                <div class = "form-group-row" >
                     <label for = "startDate">Start Date</label>
                     <input type="text" class = "form-control js-date" id="startDate" name = "startDate">
                </div>
            </div>
            <div class = "col-md-4 col-md-offset-2">
                <div class = "form-group-row">
                     <label for = "endDate">End Date</label>
                     <input type = "text" class = "form-control js-date" id = "endDate"  name = "endDate">
                </div>
            </div>         
        </div>
        <div class = "col-md-6" style="border:1px;">
            <div class = "form-group">
                <label for = "priorities">Priorities</label>
                <textarea class = "form-control" name = "priorities" id = "priorities" style="min-height: 400px;"></textarea>
            </div>
        </div>
                
        <div class = "col-md-6" style="border:1px;">
            <div class = "form-group">
                <label for = "accomplishments">Accomplishments</label>
                <textarea class = "form-control" name = "accomplishments" id = "accomplishments" style="min-height: 400px;"></textarea>
            </div>
        </div>
        </div>
        <div class = "form-group" align="center">
            <input type = "submit" class = "btn btn-primary"></button>
        </div>
    </form>

</div>

<script>
$('.js-date').each(function(){
        
        $(this).datepicker();
    }); 
</script>@endSection
