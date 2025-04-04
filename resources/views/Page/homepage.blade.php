@extends('Layout.master')

@section('content')
<div>
    <!-- Search box -->
    <div class="search-container">
        <h2 class="description">720 IT Jobs For Developers</h2>
        <div class="search-box">
            <div class="cities-filter">
                <select class="cities"> 
                    <option value="">All Cities</option>
                    <option value="">Ha Noi</option>
                    <option value="">Ho Chi Minh</option>
                    <option value="">Da Nang</option>
                    <option value="">Quy Nhon</option>
                    <option value="">Vung Tau</option>
                    <option value="">Binh Duong</option>
                    <option value="">Binh Phuoc</option>
                    <option value="">Dong Nai</option>
                    <option value="">Hai Phong</option>
                    <option value="">Quang Ninh</option>
                </select>
            </div>

            <div class="inputSearch">
                <input class="search-input" type="text" placeholder="Enter keyword skill (Java, iOS, ...), job title, company ...">
            </div>

            <div class="button-search">
                <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
            </div>
           
        </div>
        <div class="suggestions">
            <span>Suggestions for you:</span>
            <span class="tag">Java</span>
            <span class="tag">ReactJS</span>
            <span class="tag">.NET</span>
            <span class="tag">Tester</span>
            <span class="tag">PHP</span>
            <span class="tag">Business Analyst</span>
            <span class="tag">NodeJS</span>
        </div>
    </div>
<!-- Best tools -->
    <div class="tools-container">
        <h2 class="best-tools-des">Best Tools For Your Application Journey</h2>
        <div class="tools">
            <!-- User Profile -->
            <div class="tool-card">
                <div class="card-top">
                    <img src="assets/images/userProfile.png" alt="User Profile">
                    <h3 class="title-card">User Profile</h3>
                    <p class="content-card">Create an excellent profile with a well-structured format and specific guide</p>
                </div>
                <button class="btn">Update profile</button>
            </div>

            <!-- Job Search -->
            <div class="tool-card">
                <div class="card-top">
                    <img src="assets/images/jobSearch.png" alt="Job Search">
                    <h3 class="title-card">Job Search</h3>
                    <p class="content-card">Find and apply for the best job opportunities that match your skills and interests</p>
                </div>
                <button class="btn">Find jobs</button>
            </div>

            <!-- Company List -->
            <div class="tool-card">
                <div class="card-top">
                    <img src="assets/images/companyList (1).png" alt="Company List">
                    <h3 class="title-card">Company List</h3>
                    <p class="content-card">Browse a list of top companies, explore their profiles, and find job opportunities</p>
                </div>
                <button class="btn">View companies</button>
            </div>
        </div>
    </div>

<!-- Top Employers -->
    <div class="employers-container">
        <h2 class="top-employers">Top Employers</h2>
        <div class="employers-grid">
            @foreach ($companies as $company)
                <div class="employer-card">
                    <div class="logo">
                        <img class="logo-employer" src="assets/images/companies/{{$company->logo}}" alt="Edulearn"></div>
                    <h3 class="name-employer"><a href="">{{$company->company_name}}</a></h3>
                    <div class="tags">
                        <span class="tag-language">AI</span> 
                        <span class="tag-language">Machine Learning</span> 
                        <span class="tag-language">Python</span> 
                        <span class="tag-language">Big Data</span>
                        <span class="tag-language">React Native</span>
                        <span class="tag-language">Laravel</span>
                    </div>
                    <p class="location-employer">{{ Str::limit($company->company_address, 25, '...') }}</p>
                    <div class="jobs"><a href="">{{ $company->jobs_count }} Jobs</a></div>
                </div>
            @endforeach
        </div>
    </div>
<!-- Get Hired -->
    <div class="steps" id="about">
        <div class="section__container steps__container">
            <h2 class="section__header">
                Get Hired in 4 <span>Quick Easy Steps</span>
            </h2>
            <p class="section__description">
                Follow Our Simple, Step-by-Step Guide to Quickly Land Your Dream Job
                and Start Your New Career Journey.
            </p>
            <div class="steps__grid">
                <img src="/assets/images/steps-bg.png" alt="Steps Background" class="steps__image">
            
                <div class="steps__card">
                    <span><i class="ri-user-fill"></i></span>
                    <h4>Create an Account</h4>
                    <p>
                        Sign up with just a few clicks to unlock exclusive access to a
                        world of job opportunities and landing your dream job. It's quick,
                        easy, and completely free.
                    </p>
                </div>

                <div class="steps__card">
                    <span><i class="ri-search-fill"></i></span>
                    <h4>Search Job</h4>
                    <p>
                        Dive into our job database tailored to match your skills and
                        preferences. With our advanced search filters, finding the perfect
                        job has never been easier.
                    </p>
                </div>

                <div class="steps__card">
                    <span><i class="ri-file-paper-fill"></i></span>
                    <h4>Upload CV/Resume</h4>
                    <p>
                        Showcase your experience by uploading your CV or resume. Let
                        employers know why you're the perfect candidate for their job
                        openings.
                    </p>
                </div>

                <div class="steps__card">
                    <span><i class="ri-briefcase-fill"></i></span>
                    <h4>Get Job</h4>
                    <p>
                        Take the final step towards your new career. Get ready to embark
                        on your professional journey and secure the job you've been
                        dreaming of.
                    </p>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection


