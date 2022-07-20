<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CouponTerm
 *
 * @property int $id
 * @property string $term
 * @property int $coupon_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CouponTermFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponTerm newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponTerm newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponTerm query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponTerm whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponTerm whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponTerm whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponTerm whereTerm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponTerm whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CouponTerm extends Model
{
    use HasFactory;
    protected $fillable = ['term', 'coupon_id'];
}
