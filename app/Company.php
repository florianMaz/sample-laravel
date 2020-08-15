<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $fillable = ['name', 'email', 'address', 'phone', 'website'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
