<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'logo_url',
        'website_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}