<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Store;
use App\Models\Category;

/**
 * App\Models\Subscriber
 *
 * @property int $id
 * @property string $email
 * @property int $store_id
 * @property int $category_id
 * @property string $model
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Category|null $category
 * @property-read Store|null $store
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subscriber whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Subscriber extends Model
{
    use HasFactory;
    protected $fillable = ['email','store_id', 'category_id', 'model', 'date'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
