<?php

use App\Models\Company;
use Carbon\Carbon;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;



Route::get('horasde/{fecha}/{inicio}/{fin}/{intervalo}', function ($fecha, $hora_inicio, $hora_fin, $intervalo = 30) {
    $fecha = Carbon::create(2021, 06, 21);
    $hora_inicio = new DateTime( $hora_inicio );
    $hora_fin    = new DateTime( $hora_fin );
    $hora_fin->modify('+1 second');
    // Añadimos 1 segundo para que muestre $hora_fin
    
    // Si la hora de inicio es superior a la hora fin añadimos un día más a la hora fin
    if ($hora_inicio > $hora_fin) {
        $hora_fin->modify('+1 day');
    }
    // Establecemos el intervalo en minutos
    $intervalo = new DateInterval('PT'.$intervalo.'M');

    // Sacamos los periodos entre las horas
    $periodo   = new DatePeriod($hora_inicio, $intervalo, $hora_fin);
    
    foreach( $periodo as $hora ) {
        $horas[] =  $hora->format('H:i:s');
    }
    dd($fecha, $horas);
});









Route::get('/foo', function () {
    $exitCode = Artisan::call('cache:clear');
});



Route::get('contar',function(){
   $time = time();
   $x= '..........';
   for($i=$time/$time;$i<= strlen($x) * strlen($x);$i++){
        echo $i . '<br>';
   }
});



Route::get('totalxcliente/{service_id}/{customer_id}/{days}',function($service_id,$customer_id,$days){
    $customer = Customer::findOrFail($customer_id);
    $transaction = new Transaction;
    $from_date  = Carbon::today()->subdays($days)->startofDay();
    $to_date    = Carbon::today()->endOfDay();
     dd('Por Cliente='      . $customer->sum_servce_from_to($service_id,$from_date,$to_date),
        'Por Transacción='  . $transaction->total_amount_customer_service($customer_id,$service_id,$days ));
});
