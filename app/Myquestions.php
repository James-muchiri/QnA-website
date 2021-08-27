<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Myquestions extends Model
{
    //


    protected $fillable = [
        'myquestionsid', 'myquestions'
 
    ];


    protected $casts = ['myquestions' => 'array'];
}
