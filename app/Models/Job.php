<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Job extends Model
{

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];
     protected $hidden = [
        'created_at',
        'updated_at',
    ];


    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
