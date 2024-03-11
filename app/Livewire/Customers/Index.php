<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $posts, $name, $address,$credit_limit, $id, $updateCust = false, $addCust = false;

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

    /**
     * Open Add Post form
     * @return void
     */
    public function addPost()
    {
        $this->resetFields();
        $this->addCust = true;
        $this->updateCust = false;
    }

    public function editPost($id){
        try {
            $post = Customer::findOrFail($id);
            if( !$post) {
                session()->flash('error','Post not found');
            } else {
                $this->name = $post->name;
                $this->address = $post->address;
                $this->credit_limit = $post->credit_limit;
                $this->id = $post->id;
                $this->updateCust = true;
                $this->addCust = false;

            }
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }

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
