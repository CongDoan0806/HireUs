@extends('Layout.master')

@section('content')
    <div class="large-header">
        <div class="header-company">
            <h1>Vietnam Best IT Companies 2025</h1>
            <div class="head-content">
                <div class="content-p">
                    <p>
                        These top 30 Vietnam IT companies (15 Large, 15 Small & Medium) are recognized to provide
                        the best culture, benefits, working environment, management care and training, selected out of 11,000+ IT companies listed on ITviec.
                    </p>
                    <p>
                        The general ratings were generated solely from reviews by IT employees in Vietnam from Jan 01, 2024 to Dec 31, 2024, not all-time ratings of the winning companies.
                        Please refer to our FAQs for details on the methodology and rankings.
                    </p>
                </div>
                <div class="logo-img">
                    <img src="/assets/images/logo/logo.png" alt="logo_heriUs">
                </div>
            </div>
        </div>
    </div>
    <div class="large-container">
        <div class="container-company">
            <h2>All companies</h2>
            @foreach($companies as $company)
                <div class="company">
                    <div class="info-company">
                        <img src="{{ asset('assets/images/Companies/' . $company->logo) }}" alt="{{ $company->company_name }}">
                        <div class="company-details">
                            <strong>{{ $company->company_name }}</strong>
                            <p class="info-detils">
                                <i class="fa-solid fa-users-line"></i>
                                {{ $company->employee_count }} employees<br> {{ $company->comp_benefit }}
                            </p>
                        </div>
                    </div>
                    <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <span><b>5.0</b></span>
                        <span>Overall rating</span>
                        <a href="#">View details</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection