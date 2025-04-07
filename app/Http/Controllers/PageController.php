<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
    public function viewCompanyProfile($id){
        $company = Company::find($id);
        if (!$company) {
            return response()->json(['message' => 'Company not found'], 404); 
        }
        $reviews = Comment::where('company_id', $id)->with('user')->orderBy('created_at', 'desc')->get();
        $reviewCount = Comment::where('company_id', $id)->count();
        $averageRating = Comment::where('company_id', $id)->avg('rating');
        $averageRating = number_format($averageRating, 1);
        $ratings = [];
        for ($i = 1; $i <= 5; $i++) {
            $ratings[$i] = Comment::where('company_id', $id)->where('rating', $i)->count();
        }
    
        $ratingPercentages = [];
        foreach ($ratings as $star => $count) {
            $ratingPercentages[$star] = $reviewCount > 0 ? round(($count / $reviewCount) * 100, 2) : 0;
        }
        return view('Page.companyProfile', compact('company', 'reviews', 'reviewCount', 'averageRating', 'ratingPercentages'));
    }
}
