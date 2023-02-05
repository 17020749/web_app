<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{

    public function rawData(Request $request): View
    {
        // check permission

        // Get report data từ db report
        $rawData = [];

        // Đẩy sang view để hiển thị
        return view('pages.report.raw', ['rawData' => $rawData]);
    }

    public function viewAlert(Request $request): View
    {
        // check permission

        // Get report data từ db report
        $alertData = [];

        // Đẩy sang view để hiển thị
        return view('pages.report.alert', ['alertData' => $alertData]);
    }
}
