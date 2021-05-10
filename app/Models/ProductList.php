<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $all)
 */
class ProductList extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "product_id",
        "product_name",
        "product_url",
        "product_image_url",
        "post_id",
        "buy_in",
        "prize",
    ];
}
