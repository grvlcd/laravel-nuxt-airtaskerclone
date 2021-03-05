<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Experience;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'birthday',
        'age',
        'gender',
        'bio',
    ];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function skills() {
        return $this->hasMany(Skill::class);
    }

    public function educations() {
        return $this->hasMany(Education::class);
    }

    public function experiences() {
        return $this->hasMany(Experience::class);
    }
}
