<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Store;
use App\Models\Event;
use App\Models\Category;

/**
 * App\Models\Widget
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property int $user_id
 * @property int $updated_by
 * @property string $related_sidebar
 * @property int $store_id
 * @property int $event_id
 * @property int $category_id
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Category|null $category
 * @property-read Event|null $event
 * @property-read Store|null $store
 * @property-read User|null $updated_by_who
 * @property-read User|null $user
 * @method static \Database\Factories\WidgetFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Widget newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Widget query()
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereRelatedSidebar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Widget whereUserId($value)
 * @mixin \Eloquent
 */
class Widget extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'user_id', 'related_sidebar', 'store_id', 'event_id', 'category_id', 'updated_by', 'order'];

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

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}