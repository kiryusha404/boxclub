<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ApplicationController extends Controller
{
    //обработка заявки
    public function processing_application(Request $application){
        if(Auth()->User() && Auth()->User()->role_id > 1) {
            DB::table('application')->where('id', '=', $application->id)->update(['status' => 'processing']);
        }
        return redirect()->back();
    }

    //завершение заявки
    public function completed_application(Request $application){
        if(Auth()->User() && Auth()->User()->role_id > 1) {
            DB::table('application')->where('id', '=', $application->id)->update(['status' => 'completed']);
        }
        return redirect()->back();
    }
}
