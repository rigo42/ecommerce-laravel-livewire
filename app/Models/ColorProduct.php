<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected = $table => 'color_product';
    
    public function imageMultiples(){
        return $this->morphMany(ImageMultiple::class, 'imageable');
    }
}
