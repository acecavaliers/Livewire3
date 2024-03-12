<?php

namespace App\Livewire\Customers;

use App\Models\Customer;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Rule('required')]
    public string $name = '';

    #[Rule('required')]
    public string $slug = '';

    #[Rule('required')]
    public string $address = '';

    #[Rule('required')]
    public float $credit_limit = 0;

    public $posts, $id, $updateCust = false, $addCust = false;

    public $isOpen1 = 0;

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

    public function create()
    {
        // $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen1 = true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen1 = false;
    }

     /**
     * Cancel Add/Edit form and redirect to post listing page
     * @return void
     */
    public function cancelPost()
    {
        $this->addCust = false;
        $this->updateCust = false;
        $this->resetFields();
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

    public function resetFields(){
        $this->name = '';
        $this->credit_limit = '';
        $this->slug = '';
        $this->address = '';
    }


    public function save()
    {
        $this->validate();

        // Customer::create(
        //     $this->only(['name', 'slug','address','credit_limit'])
        // );

        // return $this->redirect('/customer');

        try {
            Customer::create(
                $this->only(['name', 'slug','address','credit_limit'])
            );
            // Posts::create([
            //     'title' => $this->title,
            //     'description' => $this->description
            // ]);
            session()->flash('success','Customer Created Successfully!!');
            $this->resetFields();
            $this->isOpen1 = false;
        } catch (\Exception $ex) {
            session()->flash('error','Something goes wrong!!');
        }
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
