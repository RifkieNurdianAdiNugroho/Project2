<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'description', 'category', 'price', 'status'];

    /**
     * Get the user that owns the Goods
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the goodsImages for the Goods
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function goodsImages()
    {
        return $this->hasMany(GoodsImages::class);
    }
}
