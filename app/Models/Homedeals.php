<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Store;
use App\Models\Coupon;
use App\Models\Widget;

/**
 * App\Models\Homedeals
 *
 * @property int $id
 * @property int $related_store_id
 * @property string|null $deal_1_title
 * @property string|null $deal_1_thumbnail
 * @property string|null $deal_1_link
 * @property string|null $deal_2_title
 * @property string|null $deal_2_thumbnail
 * @property string|null $deal_2_link
 * @property string|null $deal_3_title
 * @property string|null $deal_3_thumbnail
 * @property string|null $deal_3_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Store|null $store
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals query()
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereDeal1Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereDeal1Thumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereDeal1Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereDeal2Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereDeal2Thumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereDeal2Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereDeal3Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereDeal3Thumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereDeal3Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereRelatedStoreId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Homedeals whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Homedeals extends Model
{
    use HasFactory;
    protected $table = "home_special_deals";
    protected $guarded = [];

    public function store()
    {
        return $this->belongsTo(Store::class, 'related_store_id');
    }
    
    public function getThumbnail($thumbnail)
    {
        return "storage/" . $thumbnail;
    }
}
