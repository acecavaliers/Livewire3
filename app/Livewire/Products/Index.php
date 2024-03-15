<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use  WithPagination;
    public function render()
    {
        return view('livewire.products.index',[
            'products'=>Product::latest()->take(15)->paginate(10)
        ])->layout('layouts.app');
    }
}
