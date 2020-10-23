<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'price','offer', 'offer_price', 'image_url',
                            'category_id', 'available'];

    /**
     * @var array
     */
    protected $casts = [
        'available' => 'boolean',
        'offer' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function isLiked()
    {
        return $this->hasOne(Like::class)->where('user_id', auth()->id());
    }

    public function likeds()
    {
        return $this->hasOne(Like::class)->where('user_id', auth()->id())
            ->orderBy('updated_at', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function likesCount()
    {
        return $this->hasOne(Like::class)->selectRaw('product_id, count(*) as count')
            ->groupBy('product_id');
    }

    /**
     * @return mixed
     */
    public function getLikesCountAttribute()
    {
        return $this->likesCount->count;
    }


}
