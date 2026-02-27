<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'price', 'discount_price',
        'stock', 'sku', 'featured_image', 'status', 'category_id',
        'brand_id', 'created_by'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function suppliers() { return $this->belongsToMany(Supplier::class)->withPivot('purchase_price'); }
}
