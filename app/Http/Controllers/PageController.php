<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function viewhomepage(){
        $companies = Company::withCount('jobs')->orderByDesc('jobs_count')->take(9)->get();
        return view('Page.homepage', compact('companies'));
    }
    public function viewcompany() {
        $companies = Company::all();
        return view('Page.company', compact('companies')); 
    }
}
