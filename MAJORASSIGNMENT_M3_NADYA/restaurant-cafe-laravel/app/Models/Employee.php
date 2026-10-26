<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    public $timestamps = false;
    protected $fillable = [
        'employee_id',
        'employee_name',
        'contact',
        'job_title',
        'status'
    ];

}
