<?php
namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon as CarbonCarbon;
class Calendars extends Component
{
    public $events = '';
    public $show = '';
    public $full_name, $date_reserve, $email, $address, $start, $end, $photo, $phone, $negocio, $fecha;
    public function mount()
    {
        $this->manage_title = "Manage Calendar";
        $this->create_button_label = "Create Calendar";
        $this->search_label = "Calendar Name";
        
    }
    public function getevent()
    {       
        $events = Event::select('id','title','start', 'end')->get();
        return  json_encode($events);
    }
 
  
    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        $input['end'] = $event['end'];
        Event::create($input);
    }
 
 
    public function eventDrop($event, $oldEvent)
    {
      $eventdata = Event::find($event['id']);
      $eventdata->start = $event['start'];
      $eventdata->save();
    }
 
    
    public function render()
    {
        $this->fecha = CarbonCarbon::now();
        $events = Event::select('id','title','start', 'end')->get();
        $this->events = json_encode($events);
        return view('livewire.calendars');
    }

    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
            return response()->json($data);
    	}
    	return view('livewire.calendars');
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
    public function closeModal() {
		$this->isOpen = false;
		$this->isOpen2 = false;
	}
}