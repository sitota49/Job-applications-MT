<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSkill extends Model
{
    use HasFactory;
    protected $fillable = [
        'level',
    ];

     protected $hidden = [
        'created_at',
        'updated_at',
    ];



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

      public function skill()
    {
        return $this->belongsTo(Skill::class, 'skill_id');
    }
}
