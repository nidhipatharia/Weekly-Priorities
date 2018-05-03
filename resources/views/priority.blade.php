@extends('master')
@Section('content')
{{ session()->get('userName') }}
<div class = "col-xs-12 col-md-6 col-md-offset-1">
<div class = "panel panel-primary">
<div class = "panel panel-body">
<form method="POST" action="priority/store">
{!! csrf_field() !!}
<div class = "form-group">
                            
                        <div class = "form-group">
                        <label for = "userName">UserName</label>
                            <input type = "email" class = "form-control" id = "userName"  name = "userName" value="{{ session()->get('userName') }}">
                        </div>
                        <div class = "form-group">
                            <label for = "description">Description</label>
                            <textarea class = "form-control" name = "description" id = "description"></textarea>
                        </div>
                        <div class = "form-group">
                        	<button type = "submit" class = "btn btn-primary">Submit</button>
                        </div>
</div>
</form>
</div>
</div>
</div>
@endSection