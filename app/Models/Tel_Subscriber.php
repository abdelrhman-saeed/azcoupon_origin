<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Store;

/**
 * App\Models\Tel_Subscriber
 *
 * @property int $id
 * @property string $visitor_phone
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Store[] $stores
 * @property-read int|null $stores_count
 * @method static \Illuminate\Database\Eloquent\Builder|Tel_Subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tel_Subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tel_Subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tel_Subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tel_Subscriber whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tel_Subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tel_Subscriber whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tel_Subscriber whereVisitorPhone($value)
 * @mixin \Eloquent
 */
class Tel_Subscriber extends Model
{
    use HasFactory;
    protected $fillable = ['visitor_phone', 'date'];

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'stores_tel__subscribers');
    }
}
