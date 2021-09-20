<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;

class Banner extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    //Logs
    protected static $logName = 'Banners';
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Una banner ha sido {$eventName}";
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function banner(){
        $image = 'https://www.assisisantuariospogliazione.it/wp-content/uploads/2020/12/download-exe.png';

        if($this->image){
            $image = Storage::url($this->image->url);
        }

        return $image;
    }
}
