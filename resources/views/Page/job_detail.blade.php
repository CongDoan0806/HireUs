@extends('Layout.master')

@section('content')
<section class="job-card">
    <div class="job-header">
        <div class="job-intro">
            <img src="{{ asset('assets/images/companies/'.$company->logo) }}" alt="Company Logo" class="company-logo">
            <div class="job-info">
                <div class="job-title">{{$job_detail->job_title}}</div>
                <div class="company-name">{{$company->company_name}}</div>
                <div class="tagline">You'll love it</div>
            </div>
        </div>
        <div class="apply-container">
            <button class="apply-btn">Ứng tuyển</button>
            <span class="heart-icon"><i class="fa-regular fa-heart"></i></span> 
        </div>
    </div>

    <div class="job-info-above">
        <p class="content"><i class="fa-solid fa-map-location-dot" style="color: gray;"></i>{{$job_detail->location}}</p>
        <p class="content"><i class="fa-solid fa-building" style="color: gray;"></i>{{$job_type->job_type_name}}</p>
        <p class="content"><i class="fa-solid fa-clock-rotate-left" style="color: gray;"></i>{{$job_detail->posted_date}}</p>
    </div>
    <!-- Section -->
    <div class="section-reason">
        <h2 class="title-section">Top 3 reasons to join us</h2>
        <ul class="list-reason">
            @foreach ($benefits as $item)
                <li class="reason">{{ $item->benefit }}</li>
            @endforeach
        </ul>
    </div>

    <div class="section-description">
        <h2 class="title-description">Job description</h2>
        <p class="job-description">{{$job_detail->job_description}}</p>
        <div class="section-responsibilities">
            <h3 class="job-responsiblities">Responsibilities:</h3>
            <ul class="list-responsiblities">
                @foreach ($responsibilities as $item)
                    <li class="responsibility">{{ $item->responsibility }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="section-experience">
        <h2 class="title-experience">Your skills and experience</h2>
        <ul class="list-experience">
            @foreach ($requirements as $item)
                <li class="experience">{{ $item->requirement }}</li>
            @endforeach
        </ul>
    </div>
</section>
@endsection


