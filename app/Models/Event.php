<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Coupon;
use App\Models\Widget;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property int $single_event
 * @property string|null $banner
 * @property string|null $banner_title
 * @property string|null $banner_subtitle
 * @property int $user_id
 * @property int $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $description
 * @property-read \Illuminate\Database\Eloquent\Collection|Coupon[] $coupons
 * @property-read int|null $coupons_count
 * @property-read User|null $updated_by_who
 * @property-read User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection|Widget[] $widgets
 * @property-read int|null $widgets_count
 * @method static \Database\Factories\EventFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereBannerSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereBannerTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSingleEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUserId($value)
 * @mixin \Eloquent
 */
class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function updated_by_who()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class)->withTimestamps();
    }

    public function offers()
    {
        return $this->coupons()->where('offer', 1);
    }

    public function widgets()
    {
        return $this->hasMany(Widget::class)->orderBy('order');
    }
    
    public function getImage()
    {
        return strlen($this->banner) == 0 || $this->banner == '' ? asset('admin_assets/images/banners/banner.webp') : asset('storage/' . $this->banner);
    }
}