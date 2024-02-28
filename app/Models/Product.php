<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[

        'vendor_id',
        'name',
        'description',
        'price',
        'quantity',
        'uom',
        'image',
        'slug',
        'featured',

      ];

      public function vendor()
      {
          return $this->belongsTo(Vendor::class);
      }
      public function scopeCreatedat($query)
      {
          $query->where('created_at','<=',Carbon::now());
      }

      public function scopeFeatured($query)
      {
          $query->where('featured',true);
      }
}
