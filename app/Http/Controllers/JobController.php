<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    public function showJobDetail(){
        return view('Page.job_detail');
    }
}
