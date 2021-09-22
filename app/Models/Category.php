<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    //Logs
    protected static $logName = 'Categoría';
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Una categoría ha sido {$eventName}";
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function imagePreview(){
        $image = asset('assets/admin/media/file/file.png');

        if($this->image){
            $image = Storage::url($this->image->url);
        }

        return $image;
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
