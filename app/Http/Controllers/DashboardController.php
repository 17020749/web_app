<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report\Alert;
class DashboardController extends Controller
{
    public function viewDashboard(Request $request) {
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
        return view('dashboard', ['alertData' => $alertData]);
    }
}
