<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exceptions\UserException;
use App\Http\Requests\Auth\ValidateInsertUser;
use Illuminate\Database\QueryException;
use App\Models\User;
class AdminController extends Controller
{
    public function viewAdmin() {
        $data = User::query()->paginate(20);
        return View('pages.admin.permission', ['user' => $data]);
    }
    public function viewInsert() {
        return View('pages.admin.insertUser');
    }
    public function updateUser(Request $request) {
        try {
        DB::table('users')
            ->where('id', $request->id)
            ->update(['username' => $request->userName]);
    } catch (QueryException $e) {
        
           $errorCode = $e->errorInfo[1];
        if ($errorCode == 1062) {
            throw new UserException('Người dùng đã tồn tại');
            
        }
        throw new UserException('Lỗi cập nhật người dùng');
        }
          return redirect(route('admin'))->with('message', 'Update Thành công');
    }
    
    public function insertUser(Request $request, ValidateInsertUser $validate) {
                try{
                            $user = new User;
                $user->name = $request->name;
                 $user->username = $request->userName;
                 $user->email = $request->email;
                 $user->donvi = $request->donvi;
                 $user->isAdmin = $request->roles;
                 $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
                 $user->save();
                }
               
                
                    catch (QueryException $e){
                         $errorCode = $e->errorInfo[2];
                        //  dd($errorCode);
                         throw new UserException($errorCode);
                    }
                 
    return redirect(route('admin'))->with('message', 'Thêm mới thành công');
    }
    public function deleteUser(Request $request) {
        
        DB::table('users')->delete($request->id);
          return redirect()->route('admin')->with('message', 'Xóa thành công');
    }
    }
 
