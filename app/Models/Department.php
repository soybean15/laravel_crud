<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name'
    ];

    public function scopeSearch(Builder $builder, $search){



        $builder->where('name','like',"%$search%");
    }

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
