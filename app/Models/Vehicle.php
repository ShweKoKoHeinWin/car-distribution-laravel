<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'brand_id',
        'category_id',
        'engine',
        'transmission',
        'fuel',
        'price',
        'front_img',
        'side_img',
        'back_img',
        'inside_img',
        'purpose'
    ];


    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['brand'] ?? false) {
            $query->where('brand_id', 'like', '%' . request('brand') . '%');
        }

        if ($filters['category'] ?? false) {
            $query->where('category_id', 'like', '%' . request('category') . '%');
        }

        if (isset($filters['price'])) {
            $query->where('price', '<=', request('price'));
        }

        if (isset($filters['search'])) {
            $searchTerm = $filters['search'];

            $query->where(function ($query) use ($searchTerm) {
                $query->whereHas('brand', function ($relationQuery) use ($searchTerm) {
                    $relationQuery->where('title', 'LIKE', '%' . $searchTerm . '%');
                })->orWhereHas('category', function ($relationQuery) use ($searchTerm) {
                    $relationQuery->where('title', 'LIKE', '%' . $searchTerm . '%');
                })
                    ->orWhere('model', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('fuel', 'LIKE', '%' . $searchTerm . '%');
            });
        }


        // if ($filters['search'] ?? false) {
        //     $query->where('brand_title', 'like', '%' . request('search') . '%')
        // ->orWhere('title', 'like', '%' . request('search') . '%')
        // ->orWhere('description', 'like', '%' . request('search') . '%');
        // }
    }
}
