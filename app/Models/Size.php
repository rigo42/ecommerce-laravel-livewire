<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Size extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    //Logs
    protected static $logName = 'Medidas';
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Una medida ha sido {$eventName}";
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    public function priceToString(){
        return '$'.number_format($this->price, 2, '.', ',');
    }

    public function validatecolorSelected($colorId){
        foreach($this->colors()->get() as $color){
            if($color->pivot->color_id == $colorId){
                return true;
            }
        }
        return false;
    }
}
