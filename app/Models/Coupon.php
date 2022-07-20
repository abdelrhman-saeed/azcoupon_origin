<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Category;
use App\Models\Store;
use App\Models\Event;
use App\Models\CouponTerm;

use Carbon\Carbon;

/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string|null $code
 * @property float|null $discount
 * @property string $preference
 * @property string|null $expire_date
 * @property string|null $link
 * @property int $online
 * @property int $user_id
 * @property int $updated_by
 * @property int $store_id
 * @property int $offer
 * @property int $featured
 * @property int $super_featured
 * @property int $verified
 * @property int $viewed
 * @property int $top_coupon
 * @property int $expire_soon
 * @property string $publish_type
 * @property string|null $schedule_from
 * @property string|null $schedule_to
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $categories
 * @property-read int|null $categories_count
 * @property-read \Illuminate\Database\Eloquent\Collection|CouponTerm[] $couponterms
 * @property-read int|null $couponterms_count
 * @property-read \Illuminate\Database\Eloquent\Collection|Event[] $events
 * @property-read int|null $events_count
 * @property-read Store|null $store
 * @property-read User|null $updated_by_who
 * @property-read User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon availableInSchedule()
 * @method static \Database\Factories\CouponFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon notExpired()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereExpireSoon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereOffer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereOnline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon wherePreference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon wherePublishType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereScheduleFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereScheduleTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereSuperFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereTopCoupon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereViewed($value)
 * @mixin \Eloquent
 */
class Coupon extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 
        'description', 
        'code', 
        'discount', 
        'preference' , 
        'link', 
        'expire_date',
        'online', 
        'store_id', 
        'event_id', 
        'offer',
        'featured', 
        'super_featured', 
        'verified', 
        'top_coupon', 
        'expire_soon', 
        'user_id', 
        'updated_by',
        'publish_type', 
        'schedule_from', 
        'schedule_to'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function updated_by_who()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function expired() {
        return !($this->expire_date === null || $this->expire_date === '0000-00-00') && now()->gte($this->expire_date);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function couponterms()
    {
        return $this->hasMany(CouponTerm::class);
    }
    
    public function scopeAvailableInSchedule($query)
    {
        $today = Carbon::now()->toDateString();
        return $query->where(function($query) use ($today) {
            $query->where('publish_type', 'now')
            ->orWhere(function($query) use ($today) {
                $query->where('publish_type', 'schedule')
                ->where('schedule_from', '<=', $today)
                ->where('schedule_to', '>=', $today);
            });
        });
    }
    
    public function scopeNotExpired($query)
    {
        return $query->where(function($query){
            $query
            ->where('expire_date', '=','0000-00-00')
            ->orWhere('expire_date', NULL)
            ->orWhere('expire_date', '>', now());
        });
            
    }
}
