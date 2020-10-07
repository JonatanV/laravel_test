<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Builder\Class_;

class Project extends Model
{
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}