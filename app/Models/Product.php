<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'price', 'info', 'author', 'technique','format','img', 'user_id'];
    
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
