<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Color extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    //Logs
    protected static $logName = 'Color';
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Una color ha sido {$eventName}";
    }

    public function products(){
        return $this->belongsTo(Product::class);
    }

    public function imageMultiples(){
        return $this->morphMany(ImageMultiple::class, 'imageable');
    }

    public function sizes(){
        return $this->belongsToMany(Size::class);
    }

    public function validateSizeSelected($sizeId){
        foreach($this->sizes()->get() as $size){
            if($size->pivot->size_id == $sizeId){
                return true;
            }
        }
        return false;
    }
}
