<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'profile_id'
    ];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
