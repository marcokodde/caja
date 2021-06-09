<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Livewire\Traits\CrudTrait;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Models\Customer;
use App\Models\CustomerId;
use Carbon\Carbon as CarbonCarbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class CustomerCarts extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use WithFileUploads;
    public $title, $body;
   
   
    public function mount()
    {   
        $this->manage_title = "Manage Customers-Carts";
        $this->create_button_label = "Create Customer";
        $this->search_label = "Customer Name";
    }

    public function render()
    {    
        return view('livewire.nuevos.customer-carts');
    }
}
