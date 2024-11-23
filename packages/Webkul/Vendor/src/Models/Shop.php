<?php

namespace Webkul\Vendor\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Webkul\Vendor\Contracts\Shop as ShopContract;

class Shop extends Model implements ShopContract
{
    protected $fillable = [
        'name',
        'url',
        'description',
        'vendor_id',
        'status'
    ];

    /**
     * Get the vendor that owns the shop.
     */
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }
}