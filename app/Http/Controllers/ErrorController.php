<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function error_function(){
        $user = auth()->user();
        switch ($user->role) {
            case "student":
                return route("home_student");
                break;
            case "admin":
                return route("home_admin");
                break;
            case "responsible_teacher":
                return route("show_master");
                break;
            default:
                return route("home_student");
        }
    }
}
