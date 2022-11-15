<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'type', 'info', 'price', 'commercial','tip', 'user_id'];
    
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
