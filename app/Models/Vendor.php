<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable=[

        'name',
        'address',
        'slug',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
