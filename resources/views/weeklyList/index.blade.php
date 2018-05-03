@extends('master')
@Section('content')
@if(Session::has('message'))
    <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif
{{ Form::open(array('method' => 'post' , 'url' => 'weeklyList/filter')) }}
<div class="col-md-4 col-offset-2">
    {!! csrf_field() !!}
        {{ Form::select('email',$users,null,['class' => 'form-control', 'placeholder' => 'Select a team member']) }}
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
<div id="filtered-results">

<br>
<table class="table table-bordered table-striped">
<th>Start Date</th><th>End Date</th><th>Priorities</th><th>Accomplishments</th>

@if(session()->get('self') == 1 )
    <th>Actions</th>
@endif
@foreach($weeklyLists as $weeklyList)

<tr>
    <td>{{ $weeklyList->startDate }}</td><td>{{ $weeklyList->endDate }} </td>
    <td><table class="table table-striped">
   
    {{-- Each priority is split up into array and the first returns the seperator hence first element of the array is not passed through the loop  --}}
   
    @foreach(explode('@@',$weeklyList->priorities) as $priority)
        @unless($priority=='' || $priority=='@@')
   
        <tr><td>{{ $priority }} </td></tr>
   
        @endunless
    @endforeach
   
    </table></td>
    <td><table class="table table-striped">
   
    @foreach(explode('@@',$weeklyList->accomplishments) as $accomplishment)
        @unless($accomplishment=='' || $accomplishment=='@@')

            <tr><td>{{ $accomplishment }} </td></tr>

        @endunless
    @endforeach
    </table></td>

@if(session()->get('self') == 1 )
    <td>
    {!! Form::open(['url' => 'weeklyList/'.$weeklyList->id, 'onsubmit' => 'return ConfirmDelete()']) !!}
    {{ Form::hidden('_method', 'DELETE')}}
    <a href= {{ route('weeklyList.edit', ['id' => $weeklyList->id])}} class="btn btn-warning">Edit</a>
    {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
    {{ Form::close() }}
 </td>
@endif

</tr>

@endforeach
</table>
<div class="col-md-10 col-offset-2">
{{ $weeklyLists->links() }}
</div>
@if(session()->get('self') == 1 )
<div class="col-md-2">
<a href="{{ route('weeklyList.create') }}" class="btn btn-primary">+Add New</a>
</div>
@endif

<br><br>
<script>
    
    function ConfirmDelete(){
        return confirm("Are you sure?");
    }
</script>

@endSection