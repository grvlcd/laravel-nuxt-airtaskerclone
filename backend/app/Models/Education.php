<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'school',
        'course',
        'to',
        'from'
    ];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
