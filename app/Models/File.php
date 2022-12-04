<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'location', 'originalName', 'mime'];

    //Relación 1:1 -> Un producto tiene UN archivo
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
