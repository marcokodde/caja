<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Usuario;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('livewire.fullcalender');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Event::create([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);
    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Event::find($request->id)->update([
    				'title'		=>	$request->title,
    				'start'		=>	$request->start,
    				'end'		=>	$request->end
    			]);
    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Event::find($request->id)->delete();
    			return response()->json($event);
    		}
			
    	}
    }

	public function store(Request $request) {
        
            $user = new Usuario();
			$user->full_name = $request->full_name;
			$user->date_reserve = $request->date_reserve;
			$user->email = $request->email;
			$user->address = $request->address;
			$user->start = $request->start;
			$user->end = $request->end;
			$user->phone = $request->phone;
			$user->negocio = $request->negocio;				
			$user->save();
			return response()->json($user);

			return response()->json(['mensaje'=>'Registrado Correctamente']);
			
        }
    }
	
	
}
?>