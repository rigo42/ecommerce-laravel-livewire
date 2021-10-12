<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo();
    } 

    public function dateToString(){
        return Carbon::parse($this->created_at)->toFormattedDateString();
    }
}
