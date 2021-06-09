<?php

namespace App\Http\Livewire;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Models\Country;
use Livewire\WithPagination;


class Countries extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    public $country, $code, $url,$default,$include,$latinoamerica;
    public $search;
    public $record_id;
    public $searchTerm;
    public $isOpen = 0;
    private $pagination = 6;         //paginación de tabla

    public function mount(){
        //$this->authorize('hasaccess', 'roles.index');
    }
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function render()
    {
        $searchTerm = '%'.$this->search.'%';

        return view('livewire.countries.index',[
            'records' => Country::where('country','like', $searchTerm)->paginate($this->pagination)
        ]);


    }

     //permite la búsqueda cuando se navega entre el paginado
     public function updatingSearch(): void
     {
      $this->gotoPage(1);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function closeModal()
    {
        $this->isOpen = false;
    }

  

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    private function resetInputFields(){
        $this->country = '';
        $this->code = '';
        $this->url = '';
        $this->default = false;
        $this->include = false;
        $this->latinoamerica = false;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     public function store()
    {
        $this->validate([
            'country' => 'required',
            'code' => 'required',
            'url' => 'required',

        ]);

        $default = $this->default ? 1 : 0;
        $include = $this->include ? 1 : 0;
        $latinoamerica = $this->latinoamerica ? 1 : 0;

        Country::updateOrCreate(['id' => $this->record_id], [
            'country'   => $this->country,
            'code'      => $this->code,
            'url'       => $this->url,
            'default'   => $default,
            'include'   => $include,
            'latinoamerica'   => $latinoamerica,            
        ]);
  
        session()->flash('message', 
            $this->record_id ? 'Country Updated Successfully.' : 'Country Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function edit($id)
    {
        $record = Country::findOrFail($id);
        $this->record_id = $id;
        $this->country = $record->country;
        $this->code = $record->code;
        $this->url = $record->url;
        $this->default = $record->default;
        $this->include = $record->include;
        $this->latinoamerica = $record->latinoamerica;
        $this->openModal();
    }

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function delete($id)
    {
        Country::find($id)->delete();
        session()->flash('message', 'Country Deleted Successfully.');
    }
}
