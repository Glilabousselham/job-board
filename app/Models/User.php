<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_employer',
        'phone_number',
        'bio',
        'profile_picture_url'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function companiesJobs()
    {
        return $this->hasManyThrough(Job::class, Company::class);
    }

    public function companiesApplications()
    {
        return Application::join('jobs', 'applications.job_id', '=', 'jobs.id')
            ->join('companies', 'companies.id', '=', 'jobs.company_id')
            ->join('users', 'users.id', '=', 'companies.user_id')
            ->select('applications.*')
            ->where('users.id', '=', $this->id);
    }


    public function companies()
    {
        return $this->hasMany(Company::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function jobViews()
    {
        return $this->hasMany(JobView::class);
    }
    public function savedJobs()
    {
        return $this->hasMany(SavedJob::class);
    }
    public function jobSearches()
    {
        return $this->hasMany(JobSearch::class);
    }
}