<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'seeker_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function job(){
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

    public function seeker(){
        return $this->belongsTo(User::class, 'seeker_id', 'id');
    }  

}
