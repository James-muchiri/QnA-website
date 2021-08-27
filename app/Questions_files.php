<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions_files extends Model
{
    //


    protected $fillable = [
        'file', 'type', 'questionid'
    ];
}
