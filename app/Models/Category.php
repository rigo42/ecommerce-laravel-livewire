<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use HasFactory, sluggable, LogsActivity;

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

    public function getRouteKeyName(){
        return 'slug';
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function imagePreview(){
        $image = asset('assets/admin/media/file/file.png');

        if($this->image){
            if(Storage::exists($this->image->url)){
                $image = Storage::url($this->image->url);
            }else{
                $image = $this->image->url;
            }
            
        }

        return $image;
    }

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
