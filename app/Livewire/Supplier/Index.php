<?php

namespace App\Livewire\Supplier;

use App\Models\Vendor;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $isOpen = false;

    public $search ='';

    public $perPage ='10';

    public $sortBy='created_at';

    public $sortDir='DESC';

    public function setSortBy($sortByField)
    {
        if($this->sortBy===$sortByField)
        {
            $this->sortDir=($this->sortDir== "ASC") ? 'DESC' : "ASC";
            return;
        }
        $this->sortBy=$sortByField;
        $this->sortDir='DESC';
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
    public function delete(Vendor $vendor)
    {
        $vendor->delete();
    }
    public function render()
    {
        return view('livewire.supplier.index',[
            'vendors'=>Vendor::class

        ])->layout('layouts.app');
    }
}
