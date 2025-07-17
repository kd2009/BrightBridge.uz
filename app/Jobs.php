<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Jobs extends Model
{
    protected $fillable = [
        'title', 'location', 'type', 'info', 'responses', 'quals', 'benefits', 'salary', 'status', 'promotion', 'img', 'company', 'cat_id', 'comp_id'
    ];
}

