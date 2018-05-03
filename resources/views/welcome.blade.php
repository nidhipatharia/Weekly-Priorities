@extends('master')
@Section('content')
<h1>Weekly Priorities Application</h1>
<div class = "col-xs-12 col-md-6 col-md-offset-1">
    <div class = "panel panel-primary">
        <div class = "panel panel-body">
            <div class = "form-group">
                <label for = "startDate">Start Date</label>
                <input type = "date" class = "form-control" id = "startDate"  name = "startDate">
            </div>
                        
            <div class = "form-group">
                <label for = "endDate">End Date</label>
                <input type = "date" class = "form-control" id = "endDate"  name = "endDate">
            </div>
            <div class = "form-group">
               <a href="priority" class = "btn btn-primary">Add Priorities</a>
               <a href="accomplishment" class = "btn btn-primary">Add Accomplishments</a>
               <a href="reports" class = "btn btn-primary">View Reports</a>
            </div>
        </div>
    </div>
</div>
             

@endSection