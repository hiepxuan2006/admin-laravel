<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function CategoryComment()
    {
        return $this->hasOne(Category::class);
    }
    public function ProductImageComment()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
    public function TagsComment()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')->withTimestamps();;
    }
    public function InsertCategoryComment()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
