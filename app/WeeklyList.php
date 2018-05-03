<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeeklyList extends Model
{
    //
    public $table="weeklyLists";
    protected $fillable = [
    	'email',
    	'startDate',
    	'endDate',
    	'priorities',
    	'accomplishments'
    ];

    public function setStartDateAttribute($value){

    	$this->attributes['startDate'] = date('Y-m-d', strtotime($value));
    }
    public function setEndDateAttribute($value){
    	$this->attributes['endDate'] = date('Y-m-d', strtotime($value));
    }
    public function getStartDateAttribute(){

        return date('m/d/Y', strtotime($this->attributes['startDate']));
    }
    public function getEndDateAttribute(){
        return date('m/d/Y', strtotime($this->attributes['endDate']));
    }
    
    

}
