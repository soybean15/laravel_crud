<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Employee extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'department_id',
        'first_name',
        'last_name',
        'middle_name',
        'birth_date',
        'address',
        'gender',
        'status',
        'employee_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function fullName(): Attribute
    {
        return Attribute::make(
            get: function () {

                $middleInitial = $this->middle_name ? ' ' . substr($this->middle_name, 0, 1) . '.' : '';

                return "$this->last_name, $this->first_name $middleInitial";
            }
        );
    }

    public function formattedBirthDate(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->birth_date)->format('M d, Y')
        );
    }

    public function scopeSearch(Builder $builder, $search)
    {

        $builder->whereHas('department', function ($builder) use ($search) {
            $builder->where('name', 'LIKE', "%{$search}%");
        })
            ->orWhere('employee_code', $search)
            ->orWhere('first_name', 'LIKE', "%{$search}%")
            ->orWhere('last_name', 'LIKE', "%{$search}%");
    }
}
