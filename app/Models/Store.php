<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Review;
use App\Models\Coupon;
use App\Models\Image;
use App\Models\Widget;
use App\Models\Subscriber;
use App\Models\Tel_Subscriber;
use App\Models\Category;

/**
 * App\Models\Store
 *
 * @property int $id
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string $name
 * @property string $slug
 * @property string $title
 * @property string|null $aff_link
 * @property string|null $link
 * @property string $store_degree
 * @property string|null $about_store_1_title
 * @property string|null $about_store_1_description
 * @property string|null $about_store_2_title
 * @property string|null $about_store_2_description
 * @property string|null $about_store_3_title
 * @property string|null $about_store_3_description
 * @property string|null $about_store_4_title
 * @property string|null $about_store_4_description
 * @property string|null $about_store_5_title
 * @property string|null $about_store_5_description
 * @property string|null $about_store_6_title
 * @property string|null $about_store_6_description
 * @property string|null $about_store_7_title
 * @property string|null $about_store_7_description
 * @property string|null $about_store_8_title
 * @property string|null $about_store_8_description
 * @property int $online
 * @property int $featured
 * @property int $viewed
 * @property int $updated_by
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Coupon[] $coupons
 * @property-read int|null $coupons_count
 * @property-read Image|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection|Review[] $reviews
 * @property-read int|null $reviews_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Subscriber[] $subscribers
 * @property-read int|null $subscribers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Tel_Subscriber[] $tel_subscribers
 * @property-read int|null $tel_subscribers_count
 * @property-read User|null $updated_by_who
 * @property-read User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection|Widget[] $widgets
 * @property-read int|null $widgets_count
 * @method static \Database\Factories\StoreFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Store query()
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore1Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore1Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore2Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore2Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore3Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore3Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore4Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore4Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore5Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore5Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore6Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore6Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore7Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore7Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore8Description($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAboutStore8Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereAffLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereStoreDegree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Store whereViewed($value)
 * @mixin \Eloquent
 */
class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'seo_title', 
        'seo_description', 
        'name', 
        'slug', 
        'title', 
        'description', 
        'aff_link', 
        'link', 
        'store_degree',
        'about_store_1_title',
        'about_store_1_description',
        'about_store_2_title',
        'about_store_2_description',
        'about_store_3_title',
        'about_store_3_description',
        'about_store_4_title',
        'about_store_4_description',
        'about_store_5_title',
        'about_store_5_description',
        'about_store_6_title',
        'about_store_6_description',
        'about_store_7_title',
        'about_store_7_description',
        'about_store_8_title',
        'about_store_8_description',
        'online', 
        'featured',
        'updated_by',
        'user_id'
    ];

    public function getStoreImage()
    {   
        return implode('%20', explode(' ', asset('storage/images/markets/'.$this->image->path) ) );
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function updated_by_who()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function widgets()
    {
        return $this->hasMany(Widget::class)->orderBy('order');
    }

    public function all_coupons() {
        return $this->hasMany(Coupon::class);
    }
    public function coupons()
    {
        return $this->hasMany(Coupon::class)->where('offer', 0);
    }

    public function offers()
    {
        return $this->coupons()->where('offer', 1);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

    public function tel_subscribers()
    {
        return $this->belongsToMany(Tel_Subscriber::class, 'stores_tel__subscribers');
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class)->withPivot('category_id', 'store_id');
    }
}
