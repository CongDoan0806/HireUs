<div class="content-header">
    <nav class="navbar">
        <span class="menu-toggle">&#9776;</span>
        <div class="logo-menu">
            <div class="logo">
                <a href="/">
                    <img class="logo-hireus" src="{{ asset('assets/images/logo/logo.png') }}" alt="hireUs logo">
                </a>
            </div>
            <div class="nav-menu">
                <a href="#">All Jobs</a>
                <a href="#">IT Companies</a>
            </div>
        </div>
        <div class="nav-right">
            <span class="for-employers">For Employers</span>
            <div class="nav-actions" style="position: relative;">
                @if(Auth::check())
                @php
                    $avatarPath = Auth::user()->image; 
                @endphp
            
                <img class="user_avatar" 
                    src="{{ Str::startsWith($avatarPath, 'http') ? $avatarPath : asset('assets/images/avatars/' . $avatarPath) }}" 
                    alt="User Avatar">
                    <div class="dropdown">
                        <button class="dropdown-toggle">
                            {{ Auth::user()->full_name }}
                            <i class="arrow down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="#"><i class="bi bi-grid"></i>Overview</a>
                            <a href="#"><i class="bi bi-file-earmark-text"></i>Attached Files</a>
                            <a href="#"><i class="bi bi-person"></i>ITviec Profile</a>
                            <a href="#"><i class="bi bi-gift"></i>My Job</a>
                            <a href="#"><i class="bi bi-envelope-open"></i>Job Invitations</a>
                            <a href="#"><i class="bi bi-envelope"></i>Email Subscription</a>
                            <a href="#"><i class="bi bi-gear"></i>Settings</a>
            
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="logout-btn"><i class="bi bi-box-arrow-right"></i>Logout</button>
                            </form>
                        </div>
                    </div>
                @else
                    <a href="/login">Sign in</a>
                    <span style="color: white">/</span>
                    <a href="/register">Sign up</a>
                @endif
            </div>            
        </div>
    </nav>
</div>
<div class="mobile-menu-wrapper">
    <a href="#">All Jobs</a>
    <a href="#">IT Companies</a>
    <span class="for-employers">For Employers</span>
</div>