<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'address',
        'credit_limit',
        'slug',

    ];

    public function scopeCreatedat($query)
    {
        $query->where('created_at','<=',Carbon::now());
    }
    public function scopeSearch($query, $value)
    {
        $query->where('name', 'like',"%{$value}%")->orWhere('address', 'like',"%{$value}%");
    }
}
