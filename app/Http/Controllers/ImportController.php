<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ImportController extends Controller
{
    public function index(Request $request): View {
        // Hiển thị view trang import
        return view('pages.import');
    }

    public function importData(): RedirectResponse {
        // Xử lý import dữ liệu vào các db data
        return Redirect::route('import')->with('status', 'Imported!');
    }
}
