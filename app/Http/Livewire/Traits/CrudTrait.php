<?php

namespace App\Http\Livewire\Traits;

trait CrudTrait {

    public $manage_title,$create_button_label, $search_label, $search_label1, $create_button_label1;
    public $record_id,$record;
	public $search,$searchTerm,$search_id,$search2_id;
	public $isOpen = 0;
	public $isOpen2 = 0;
    public $create_record = true;
    public $allow_create = true;
    public $company_auth_user;
    public $allow_continue = true;
    public $message,$alert;
    public $per_page = 10;
    public $last_days = 30;
    public $msg_test ='';
    

       //permite la búsqueda cuando se navega entre el paginado


    /* Restablece la paginación */
    public function updatingSearch()
    {
        $this->resetPage();
    }


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function create() {
		$this->resetInputFields();
		$this->openModal();
	}

	public function receive() {
		$this->resetInputFields();
		$this->openModal2();
	}
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	public function openModal() {
		$this->isOpen = true;
		$this->isOpen2 = false;
	}
	public function openModal2() {
		$this->isOpen = false;
		$this->isOpen2 = true;
	}
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */

	public function closeModal() {
		$this->isOpen = false;
		$this->isOpen2 = false;
	}
}
