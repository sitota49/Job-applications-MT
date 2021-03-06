<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserRole;
use App\Models\UserSkill;
use App\Models\Job;
use App\Models\Application;

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
        'phone_number',
        'address',
        
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


    public function hasRole($roleName)
    {
        $hasRole = false;
        $userRoles = auth()->user()->userRoles()->with('role')->get();
        foreach($userRoles as $userRole)
        {
            if($userRole->role->name == $roleName)
            {
                $hasRole = true;
            }
        }

        return $hasRole;
    }

    /**
     * Get all of the userRoles for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRoles()
    {
        return $this->hasMany(UserRole::class, 'user_id', 'id');
    }
    public function userSkills()
    {
        return $this->hasMany(UserSkill::class, 'user_id', 'id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'seeker_id', 'id');
    }


}
