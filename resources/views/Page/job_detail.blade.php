@extends('Layout.master')

@section('content')
<section class="job-card">
    <div class="job-header">
        <div class="job-intro">
            <img src="assets/images/companies/devplus_logo.png" alt="Company Logo" class="company-logo"> <!-- Thêm logo -->
            <div class="job-info">
                <div class="job-title">Middle/Senior/Lead Java Developer (Spring)</div>
                <div class="company-name">Endava Việt Nam</div>
                <div class="tagline">You'll love it</div>
            </div>
        </div>
        <div class="apply-container">
            <button class="apply-btn">Ứng tuyển</button>
            <span class="heart-icon"><i class="fa-regular fa-heart"></i></span> <!-- Thêm icon trái tim -->
        </div>
    </div>

    <div class="job-info-above">
        <p><i class="fa-solid fa-map-location-dot"></i> 9-11 Dong Da street, Ward 2, Quận Tân Bình, TP Hồ Chí Minh</p>
        <p><i class="fa-solid fa-building"></i> Linh hoạt (Trại văn phòng hoặc làm từ xa)</p>
        <p><i class="fa-solid fa-clock-rotate-left"></i> 44 phút trước</p>
    </div>

    <div class="section">
        <h2>Top 3 reasons to join us</h2>
        <ul>
            <li>Valuing our people with competitive compensation</li>
            <li>Supporting our people’s health and wellbeing</li>
            <li>Empowering our people to grow and thrive</li>
        </ul>
    </div>

    <div class="section">
        <h2>Job description</h2>
        <p>Development is the largest discipline at Endava...</p>
        <h3>Responsibilities:</h3>
        <ul>
            <li>Designs, estimates, and implements technical solutions...</li>
            <li>Participates actively in all phases...</li>
            <li>Collaborates with various project stakeholders...</li>
            <li>Recommends and promotes IT industry standards...</li>
        </ul>
    </div>

    <div class="section">
        <h2>Your skills and experience</h2>
        <ul>
            <li>+2 years of experience in Java Back-end development.</li>
            <li>Strong understanding of different common programming paradigms.</li>
            <li>Strong familiarity with design/architectural patterns.</li>
            <li>Proficient in Java, Spring, Hibernate, Maven, and Gradle.</li>
            <li>Practical experience in database systems and SQL.</li>
            <li>Good understanding of version control systems like Git.</li>
        </ul>
    </div>
</section>
@endsection


