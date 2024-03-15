<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use  WithPagination;

    public $isOpen=0;

    public function create()
    {
        $this->isOpen=true;
    }

    public function render()
    {
        return view('livewire.products.index',[
            'products'=>Product::latest()->take(100)->paginate(10)
        ])->layout('layouts.app');
    }
}
