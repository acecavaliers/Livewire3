<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    #[Rule('required')]
    public string $name = '';

    #[Rule('required')]
    public string $slug = '';

    #[Rule('required')]
    public string $address = '';

    #[Rule('required')]
    public float $credit_limit = 0;

    public function save()
    {
        $this->validate();

        Customer::create(
            $this->only(['name', 'slug','address','credit_limit'])
        );

        return $this->redirect('/cuscus/create');
    }
    public function render()
    {
        return view('livewire.customers.create')->layout('layouts.app');
    }
}
