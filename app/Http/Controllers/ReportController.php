<?php

namespace App\Http\Controllers;

use App\Jobs\SynthesizeReportDataJob;
use App\Models\Report\Alert;
use App\Models\Report\ReportDaily;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use function PHPSTORM_META\type;

class ReportController extends Controller
{

    public function rawData(Request $request): View
    {        
        $rawData = Alert::query()->where('ID','like',$request->keySearch)
            ->orderBy('id')->paginate(50);
        dd(($rawData));
    
        return view('pages.report.raw', ['rawData' => $rawData]);
    }
    
    public function viewAlert(Request $request): View
    {        
        if(isset($request->donvi)) {
            $request->session()->put('selected_donvi', $request->donvi);
       
            // $users = DB::table('users')->where('isAdmin', $request->isAdmin)->get();
            $alertData = Alert::query()
            ->where('DON_VI',$request->donvi)
            ->orderBy('MA_DDO')
            ->paginate(50);
       }
       else {
           $request->session()->put('selected_donvi', '');
               $alertData = Alert::query()
            ->where('STT', 0)
            ->orderBy('MA_DDO')
            ->paginate(50);
       }
        return view('pages.report.alert', ['alertData' => $alertData]);
    }                
    
    public function viewEdit(Request $request): View
    {       
        $editData = Alert::query()
            ->where('STT', 1)
            ->orderBy('MA_DDO')
            ->paginate(50);
        return view('pages.report.edit', ['editData' => $editData]);
    }  
   
    public function update($meter_no)
    {
        DB::connection('report')
             ->statement('EXEC UpdateAlert ?', [$meter_no]);
        return redirect()->route('report.edit')->with('success', 'Cập nhật thành công');
    }

    public function runJobSynthesize() {
        SynthesizeReportDataJob::dispatch();
        return 'ok';
    }
}
