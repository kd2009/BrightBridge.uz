<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{
 protected $table = 'job_candidates'; 

    public function applications()
    {
        return $this->hasMany(Applications::class);
    }
}
 

