<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function getJobDetail(Request $request)
    {
        $job_id = $request->id;
    
        // Lấy thông tin công việc
        $job_detail = DB::table('jobs')
            ->where('job_id', $job_id)
            ->first();
    
        // Lấy thông tin công ty dựa vào company_id trong job
        $company = DB::table('companies')
            ->where('company_id', $job_detail->company_id)
            ->first();
    
        $job_type = DB::table('job_types')
            ->where('job_type_id', $job_detail->job_type_id)
            ->first();
    
        // Lấy danh sách benefit của job
        $benefits = DB::table('job_benefits')
            ->where('job_id', $job_id)
            ->get();
    
        // Lấy danh sách responsibility của job
        $responsibilities = DB::table('job_responsibilities')
            ->where('job_id', $job_id)
            ->get();
    
        // Lấy danh sách requirement của job
        $requirements = DB::table('job_requirements')
            ->where('job_id', $job_id)
            ->get();
    
        return view('Page.job_detail', compact(
            'job_detail',
            'company',
            'benefits',
            'responsibilities',
            'requirements',
            'job_type'
        ));
    }
}
