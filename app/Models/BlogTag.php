<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BlogTag extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [];

    //Logs
    protected static $logName = 'Blog Etiquetas';
    protected static $logAttributes = ['*'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    public function getDescriptionForEvent(string $eventName): string
    {
        return "Una etiqueta de blog ha sido {$eventName}";
    }

    //N:M
    public function blogs(){
        return $this->belongsToMany(Blog::class);
    }

    public function dateToString(){
        return Carbon::parse($this->created_at)->toFormattedDateString();
    }
}
