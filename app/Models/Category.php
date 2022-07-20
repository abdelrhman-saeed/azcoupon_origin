<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Coupon;
use App\Models\User;
use App\Models\Image;
use App\Models\Widget;
use App\Models\Store;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $seo_title
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property string|null $side_title
 * @property string|null $side_description
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Coupon[] $coupons
 * @property-read int|null $coupons_count
 * @property-read Image|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection|Store[] $stores
 * @property-read int|null $stores_count
 * @property-read User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection|Widget[] $widgets
 * @property-read int|null $widgets_count
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSideDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSideTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUserId($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['seo_title', 'name', 'slug', 'description', 'side_title', 'side_description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }
    
    public function stores()
    {
        return $this->belongsToMany(Store::class)->withPivot('category_id', 'store_id');
    }

    public function offers()
    {
        return $this->coupons()->where('offer', 1);
    }
    
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function widgets()
    {
        return $this->hasMany(Widget::class)->orderBy('order');
    }
    
    public function getImage()
    {
        return $this->image ? asset('storage/' . $this->image->path) : asset('admin_assets/images/categories/category_placeholder.webp');
    }
}
