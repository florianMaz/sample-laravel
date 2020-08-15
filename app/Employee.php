<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    protected $table = 'employees';
    protected $fillable = ['last_name', 'first_name', 'email', 'designation', 'company_id', 'address', 'phone', 'website'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
