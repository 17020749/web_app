<?php

namespace App\Http\Controllers;

use App\Jobs\SynthesizeReportDataJob;
use App\Models\Report\AlertDaily;
use App\Models\Report\ReportDaily;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Report\ControlledAlert;

class ReportController extends Controller
{

    public function rawData(Request $request): View
    {
        // check permission

        // Get report data từ db report
        $rawData = ReportDaily::query()
            ->orderBy('MA_DDO')
            ->paginate(50);

        // Đẩy sang view để hiển thị
        return view('pages.report.raw', ['rawData' => $rawData]);
    }

    public function viewAlert(Request $request): View
    {
        // check permission

        // Get report data từ db report
        $alertData = AlertDaily::query()
            ->orderBy('MA_DDO')
            ->paginate(50);

        // Đẩy sang view để hiển thị
        return view('pages.report.alert', ['alertData' => $alertData]);
    }

    public function edit($METER_ID)
    {
        // Tìm alert với METER_ID tương ứng và xóa nó khỏi bảng alert
        $alert = AlertDaily::where('METER_ID', $METER_ID)->first();
        $alert->delete();
    
        // Thêm alert vừa xóa vào bảng đã kiểm soát        
        $controlledAlert = new ControlledAlert();
        $controlledAlert->MA_DDO = $alert->MA_DDO;
        $controlledAlert->METER_ID = $alert->METER_ID;
        $controlledAlert->save();
    
        // Chuyển hướng người dùng đến trang danh sách đã kiểm soát
        return redirect()->route('report.controlledAlert');
    }
    
    public function runJobSynthesize() {
        SynthesizeReportDataJob::dispatch();
        return 'ok';
    }
}
