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

class Customers extends Component {
    use AuthorizesRequests;
    use WithPagination;
    use CrudTrait;
    use WithFileUploads;


    private $pagination = 10; //paginación de tabla
    public $first_name, $middle_name, $last_name, $maternal_name, $birthday, $email,
    $address, $zipcode, $phone, $photo, $active, $black_list, $marked,
    $company_id,
    $country_id,
    $occupation_id,
    $vip_id,
    $user_id,
    $identification_id,
    $identifications,
    $customer_id,
    $custom,
    $customerId;
    public $expire_at, $record, $fecha;
    public $folio, $image;
    public $town_state, $country, $countries, $occupations, $vips, $company_auth_user, $company, $auth_user;
    public $photox, $imagenx, $occupied;
    // Revisa que tenga acceso
    public function mount()
    {
        $this->manage_title = "Manage Customers";
        $this->create_button_label = "Create Customer";
        $this->search_label = "Customer Name";
        $this->town_state ='';
        $this->country_id = '';
        $this->country = '';
        $this->countries = '';
        $this->occupation_id = '';
        $this->identification_id = '';
        $this->customer_id = '';
        $this->occupations = '';
        $this->zipcode = '';
        $this->vips = '';
        $this->vip_id = '';
        $this->custom = '';
        $this->auth_user = 1;
        $this->countries = Country::orderBy('country')->get();
        
    }
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function render() {
        $this->fecha = CarbonCarbon::now();
       

        $searchTerm = '%' . $this->search . '%';
		return view('livewire.customers.index', [
            'records' => Customer::FullName($this->search)
            ->paginate($this->per_page)
        ]);
    }
    

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	private function resetInputFields() {
        $this->record_id = '';
        $this->first_name = '' ;
        $this->middle_name = '';
        $this->last_name = '';
        $this->maternal_name = '';
        $this->birthday = '';
        $this->email = '';
        $this->address ='' ;
        $this->zipcode ='' ;
        $this->phone = '';
        $this->photo = '' ;
        $this->black_list = false ;
        $this->marked = false ;
        $this->active = false;
        $this->country_id = '';
        $this->occupation_id = '';
        $this->vip_id = '';
        $this->identification_id = '';
        $this->customer_id = '';
        $this->expire_at = '';
        $this->image = '';
        $this->custom = '';
        $this->folio = '';
    }

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function store() {

        $fechaActual = date('d-m-Y');
        
        $this->validate([
            'first_name' => 'required|regex:/^[\pL\s\-]+$/u|min:3|max:40',
            'email' => 'required|email',
            'middle_name' => 'nullable|regex:/^[\pL\s\-]+$/u|min:1|max:40',
            'last_name' => 'required|regex:/^[\pL\s\-]+$/u|min:1|max:40',
            'maternal_name' => 'nullable|regex:/^[\pL\s\-]+$/u|min:3|max:40',
            'address' => 'required|min:5|max:80',
            'birthday' => "required|date|before_or_equal:".CarbonCarbon::now()->subYears(18)->format("Y-m-d"),
            'zipcode' => 'nullable',
            'phone'=> ["required", "min:7", "max:15", "string", "regex:/^([0-9])*$/"],
            'country_id' => 'required|exists:countries,id',
            'occupation_id' => 'nullable',
            'vip_id' => 'nullable',
            'identification_id' => 'nullable',
            'photox'=> 'nullable|mimes:jpeg,jpg,png,svg',
            'expire_at' => 'required|after:'.$fechaActual.' ',
            'imagenx' => 'nullable|mimes:jpeg,jpg,png,svg',
            'folio' => "required|min:3|max:15"
        ]);

        if ($this->photox) {
            $this->photo= $this->photox;
            $filePath = $this->photo->Store('public/images/customers');
        } else {
            $filePath = $this->photo;
        }
        
        if ($this->imagenx) {
            $this->image= $this->imagenx;
            $fileImage = $this->image->Store('public/images/identifications');
        } else {
            $fileImage = $this->image;
        }

        $active = $this->active ? 1 : 0;
        $black_list = $this->black_list ? 1 : 0;
        $marked = $this->marked ? 1 : 0;

        if (!$this->vip_id) {
            $this->vip_id=Null;
        }
        

        $custom = Customer::updateOrCreate(['id' => $this->record_id], [
			'first_name'=> $this->first_name,
            'middle_name'=> $this->middle_name,
            'last_name'=> $this->last_name,
            'maternal_name'=> $this->maternal_name,
            'email'=> $this->email,
            'address'=> $this->address,
            'birthday' => $this->birthday,
            'zipcode'=> $this->zipcode,
            'phone'=> $this->phone,
            'photo'=> $filePath,
            'black_list'=>  $black_list,
            'marked'=> $marked,
            'active'=> $active,
            'country_id' => $this->country_id,
            'occupation_id' => $this->occupation_id,
            'vip_id' => $this->vip_id,
            'user_id' => Auth::user()->id,
           ]);

            if($this->record){
                $CustomerId = CustomerId::Where('customer_id', $this->record->id)->first();

                if($CustomerId){
                    $CustomerId->folio = $this->folio;
                    $CustomerId->expire_at = $this->expire_at;
                    $CustomerId->image = $fileImage;
                    $CustomerId->identification_id = $this->identification_id;
                    $CustomerId->save();
                }else{

                    CustomerId::create(
                        [
                            'folio' => $this->folio,
                            'expire_at' => $this->expire_at,
                            'image' => $fileImage,
                            'identification_id' => $this->identification_id,
                            'customer_id'=> $this->record->id,
                        ]);
                }
            }else{
                CustomerId::create([
                        'folio' => $this->folio,
                        'expire_at' => $this->expire_at,
                        'image' => $fileImage,
                        'identification_id' => $this->identification_id,
                        'customer_id'=> $custom->id,
                    ]);
            }

		session()->flash('message',
        $this->record_id ? __('Customers Updated Successfully.') : __('Customers Created Successfully.'));
        $this->closeModal();
        $this->resetInputFields();
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function edit($id) {
        $this->resetInputFields();
        $record = Customer::findOrFail($id);
        $this->record_id = $id;
        
		$this->first_name = $record->first_name;
        $this->middle_name  = $record->middle_name;
        $this->last_name  = $record->last_name;
        $this->maternal_name  = $record->maternal_name;
        $this->email = $record->email;
        $this->address = $record->address;
        $this->birthday = $record->birthday;
        $this->zipcode = $record->zipcode;
        $this->phone = $record->phone;
        $this->photo = $record->photo;
        $this->black_list = $record->black_list;
        $this->marked = $record->marked;
        $this->active = $record->active;
        $this->country_id = $record->country_id;
        $this->occupation_id = $record->occupation_id;
        $this->vip_id = $record->vip_id;
        $custom = CustomerId::Where('customer_id', $record->id)->latest('id')->first();
        
        if ($custom->image) {
            $fileImage = $custom->image;
        } else {
            $fileImage = $custom->imagex;
        }

        if ($custom) {
            $this->folio = $custom->folio;
            $this->identification_id = $custom->identification_id;
            $this->expire_at = $custom->expire_at;
            $this->image = $fileImage;
        }else{
            $this->identification_id = '';
            $this->expire_at = '';
            $this->image = $fileImage;
        }
        $this->openModal();
    }

    public function selec($custom) {
        return redirect()->route('customer-cart');
    }
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	public function delete($id) {
		Customer::find($id)->delete();
		session()->flash('message', 'Customer Deleted Successfully.');
	}
}
