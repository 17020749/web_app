<?php

namespace App\Http\Controllers;

use App\Jobs\SynthesizeReportDataJob;
use App\Models\Report\AlertDaily;
use App\Models\Report\ReportDaily;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

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
            ->where('STT', 0)
            ->orderBy('MA_DDO')
            ->paginate(50);

        // Đẩy sang view để hiển thị
        return view('pages.report.alert', ['alertData' => $alertData]);
    }
  
    public function editConfirm($METER_NO)
    {
        $alert = AlertDaily::findOrFail($METER_NO); // Lấy row tương ứng của bảng ALERT
    
        // Trả về view hiển thị form xác nhận
        return view('edit-confirm', compact('alert'));
    }
    
    public function edit($METER_NO)
    {
        $alert = AlertDaily::findOrFail($METER_NO); // Lấy row tương ứng của bảng ALERT
        $alert->STT = 1; // Update giá trị của cột STT từ 0 thành 1
        $alert->save(); // Lưu lại row với giá trị đã update
        // Chuyển hướng người dùng đến trang danh sách đã kiểm soát
        return redirect()->route('report.edit')->with('success', 'Update STT thành công');
    }
    
    public function runJobSynthesize() {
        SynthesizeReportDataJob::dispatch();
        return 'ok';
    }
}
