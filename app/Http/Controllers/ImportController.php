<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\HttpException;
use function Symfony\Component\String\u;

class ImportController extends Controller
{
    public function index(Request $request): View {
        // Hiển thị view trang import
        return view('pages.import');
    }

    public function importData(Request $request): RedirectResponse {
        // Check quyen cua user có đc phép inport?
        if (!$this->checkIsAdmin($request->user)) {
            throw new HttpException(403);
        }

        // Gọi job import dữ liệu

        // Xử lý import dữ liệu vào các db data
        return Redirect::route('import')->with('status', 'Imported!');
    }

    private function checkIsAdmin(User $user) {
        return $user->isAdmin;
    }
}
