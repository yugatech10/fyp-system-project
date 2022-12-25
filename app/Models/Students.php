<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = ['name', 'email', 'password'];

    public function Projects()
    {
        return $this->hasOne(Projects ::class,'stdID','id');
    }
}
