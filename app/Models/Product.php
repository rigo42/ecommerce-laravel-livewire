<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory, sluggable, LogsActivity;

    protected $guarded = [];

    //Logs
    protected static $logName = 'Product';
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Un producto ha sido {$eventName}";
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

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function imageMultiples(){
        return $this->morphMany(ImageMultiple::class, 'imageable');
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function sizes(){
        return $this->belongsToMany(Size::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function imagePreview(){
        $image = asset('assets/admin/media/file/file.png');

        if($this->image){
            $image = Storage::url($this->image->url);
        }

        return $image;
    }

    public function hasShipping(){
        $canShipping = false;
        if($this->weight && $this->height && $this->width && $this->length){
            $canShipping = true;
        }

        return $canShipping;
    }
}
