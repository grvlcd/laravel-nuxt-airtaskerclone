<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'positon',
        'to',
        'from'
    ];

    public function profile() {
        return $this->belongsTo(Profile::class);
    }
}
