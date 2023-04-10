<?php

namespace App\Exceptions;

use Exception;

class UserException extends Exception
{
//    public function __construct($message = 'Lỗi cập nhật người dùng', $code = 0, Exception $previous = null)
//     {
//         parent::__construct($message, $code, $previous);
//     }
        public function render() {
            return redirect()->back()->withErrors(['message' => $this->getMessage()]);
        }
      
}
