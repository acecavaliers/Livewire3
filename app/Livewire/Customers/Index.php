<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Attributes\Rule;
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
    public function delete(Customer $customer)
    {
        $customer->delete();
    }
    public function render()
    {
        return view('livewire.customers.index',[
            'customers'=>Customer::search($this->search)
            ->orderBy($this->sortBy,$this->sortDir)
            ->paginate($this->perPage)
        ])->layout('layouts.app');
    }
}
