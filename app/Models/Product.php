<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Support\Facades\Storage;

class Product extends Model implements Viewable
{
    use HasFactory, sluggable, LogsActivity, InteractsWithViews;
 
    protected $guarded = [];

    //Logs
    protected static $logName = 'Producto';
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
        return $this->hasMany(Size::class);
    }

    public function colors(){
        return $this->hasMany(Color::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function imagePreview(){
        $image = asset('assets/admin/media/svg/files/blank-image.svg');

        if($this->image){
            if(Storage::exists($this->image->url)){
                $image = Storage::url($this->image->url);
            }else{
                $image = $this->image->url;
            }
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

    public function hasPromotionToString(){
        if($this->hasPromotion()){
            return 'true';
        }

        return 'false';
    }

    public function hasPromotion(){ //Verify if has promotion, true = yes it's has
        $promotion = false;

        if($this->promotion){
            $promotion = true;
        }

        return $promotion;
    }

    public function promotionExpired(){ //Verify if not has expired, true = yes it's expired
        if($this->hasPromotion()){
            $expired = false;

            if(strtotime($this->end_promotion) < strtotime(date('Y-m-d'))){
                $expired = true;
            }
    
            return $expired;
        }

        return false;
        
    }

    public function hasPromotionAndNotExpired(){ //Verify if not has expired and removed the promo, true = yes all that´s ok!
        $hasPromotionAndNotExpired = false;

        if($this->hasPromotion() && !$this->promotionExpired()){
            $hasPromotionAndNotExpired = true;
        }

        return $hasPromotionAndNotExpired;
    }

    public function isRecent(){
        if(Carbon::parse($this->created_at)->diffInDays(now()) > config('product.max_days_is_recent')){
            return false;
        }

        return true;
    }

    public function promotionDiscountPercentage(){
        return '- %'.floor((100 - ($this->price_promotion * 100) / $this->price) );
    }

    public function promotionToHtml(){
        if($this->hasPromotionAndNotExpired()){
            return '<span class="ribbon-inner bg-success"></span> Promoción';

        }
    }

    public function priceToString(){
        $price = '$'.number_format($this->price, 2, '.', ',');

        if($this->hasPromotion() == 'true' && $this->promotionExpired() == false){
            $price = '$'.number_format($this->price_promotion, 2, '.', ','). '<del class="text-secondary ml-3">'.'$'.number_format($this->price, 2, '.', ',').' </del>';
        }

        return $price;
    }

    public function dateToString(){
        return Carbon::parse($this->created_at)->toFormattedDateString();
    }
}
