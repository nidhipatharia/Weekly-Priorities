@extends('master')
@Section('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </ul>
    </div>
@endif
<div class = "col-xs-12 col-md-6 col-md-offset-1">
<div class = "panel panel-primary">
<div class = "panel panel-body">
<form method="POST" >
{!! csrf_field() !!}
<div class = "form-group">
                            <label for = "email">E-mail</label>
                            <input type = "email" class = "form-control" id = "email"  name = "email">
                        </div>
                        
                        <div class = "form-group">
                            <label for = "password">Password</label>
                            <input type = "password" class = "form-control" id = "password"  name = "password">
                        </div>
                        
                        <div class = "form-group">
                        	<button type = "submit" class = "btn btn-primary">Login</button>
                        </div>
</div>
</form>
</div>
</div>
</div>
@endSection