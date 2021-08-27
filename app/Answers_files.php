<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers_files extends Model
{
    //

    protected $fillable = [
        'file', 'type', 'answerid'
    ];
}
