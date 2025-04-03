@extends('Layout.master')
@section('content')
<div class="comp-detail-page">
    <header class="comp_main-header">
      <div class="comp_container header-container">
        <div class="company-info">
          <div class="company-logo">
            <img src="{{ asset('assets/images/companies/' . $company->logo) }}" alt="{{ $company->company_name }}">
          </div>
          <div class="company-details">
            <h1>{{$company->company_name}}</h1>
            <p>{{ Str::limit($company->company_address, 25, '...') }}</p>
          </div>
        </div>
        <div class="company-actions">
          <div class="rating-badge">
            <div class="rating-score">{{$averageRating}}</div>
            <div class="rating-stars">
              @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $averageRating)
                    <i class="bi bi-star-fill"></i> 
                @else
                    <i style="color: gray" class="bi bi-star"></i> 
                @endif
              @endfor
              <div class="rating-count">({{$reviewCount}} reviews)</div>
            </div>
          </div>
          <div class="recommendation-badge">
            <div class="recommendation-percent">100<span>%</span></div>
            <div class="recommendation-text">Recommend<br>working here to a<br>friend</div>
          </div>
        </div>
        <div class="action-buttons">
          <button id="write-review" class="btn btn-primary">Write review</button>
          <button class="btn btn-secondary">Follow</button>
        </div>
      </div>
      <div class="award-banner">
        <div class="comp_container">
          <div class="award-badge">2023 WINNER</div>
          <div class="award-text">VIETNAM BEST IT COMPANIES™</div>
        </div>
      </div>
    </header>
    <main class="main-content">
      <div class="comp_container">
        <section class="overall-rating-section">
          <h2>Overall rating</h2>
          <div class="rating-details">
            <div class="rating-breakdown">
              <div class="rating-score-large">{{$averageRating}}</div>
              <div class="stars-large">
                @for ($i = 1; $i <= 5; $i++)
                  @if ($i <= $averageRating)
                      <i class="bi bi-star-fill"></i> 
                  @else
                      <i style="color: gray" class="bi bi-star"></i> 
                  @endif
                @endfor
              </div>
              <div class="rating-count-large">({{$reviewCount}} reviews)</div>
              <div class="rating-distribution">
                @for ($i = 5; $i >= 1; $i--)
                  <div class="rating-row">
                      <div class="rating-label">{{ $i }}★</div>
                      <div class="rating-bar-container">
                          <div class="rating-bar" style="width: {{ $ratingPercentages[$i] }}%"></div>
                      </div>
                      <div class="rating-percentage">{{ $ratingPercentages[$i] }}%</div>
                  </div>
                @endfor
              </div>
              <button id="see-more" class="see-more-btn">See more <span class="arrow-down">▼</span></button>
            </div>
            <div class="recommendation-circle">
              <div class="recommendation-percent-large">100<span>%</span></div>
              <div class="recommendation-text-large">Recommend<br>working here to a<br>friend</div>
            </div>
          </div>
        </section>
  
        <section class="write-review-section">
          <div class="write-review-prompt">
            <div class="prompt-icon">
              <img src="{{ asset('assets/images/other/robot.avif') }}" alt="Review robot icon">
            </div>
            <div class="prompt-text">
              <h3>Please take a minute to share your work experience at {{$company->company_name}}</h3>
              <div class="rating-input">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <span class="rating-hint">Click a star to start reviewing</span>
              </div>
              <div class="review-info">Your review for {{$company->company_name}} will be submitted anonymously.</div>
            </div>
          </div>
        </section>
  
        <section class="reviews-section">
          <h2 class="reviews-heading">Company overview</h2>
  
          <div class="review-card">
            <div class="review-date">Posted 1 August</div>
            <div class="review-content">
              <div class="review-title">Date of establishment</div>
              <p> {{$company->founded_date}}</p>
              <div class="review-title">Company Address</div>
              <p> {{$company->company_address}}</p>
              <div class="review-title">Number of employees</div>
              <p> {{$company->employee_count}}</p>
              <div class="review-title">Our benefit</div>
              <p> {{$company->comp_benefit}}</p>
              <div class="review-improvement">
                <h4>Description:</h4>
                <ul>
                  <li>{{$company->description}}</li>
                  <li>Investing in more dedicated areas would be a good perk for employees.</li>
                </ul>
              </div>
            </div>
          </div>
  
          <div class="review-card">
            <div class="review-date">Posted from {{$company->company_name}}</div>
            <div class="review-title">Thank you for your feedback. We're glad to hear about your positive experience at {{$company->company_name}}.</div>
          </div>
  
          <div class="review-card">
            <div class="review-date">22 October 2023</div>
            <div class="review-title">Friendly environment and sociable but still professional</div>
            <div class="review-rating">
              <div class="stars-container">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
            </div>
            <div class="review-content">
              <p class="login-prompt">Sign in now to see all reviews.</p>
            </div>
          </div>
  
          <!-- More review cards would be added here -->
        </section>
      </div>
    </main>
  
    <footer class="main-footer">
      <div class="comp_container">
        <div class="footer-top">
          <div class="footer-logo">
            <img src="{{ asset('assets/images/companies/' . $company->logo) }}" alt="{{$company->company_name}}">
            <div class="company-name">{{$company->company_name}}</div>
          </div>
          <div class="footer-actions">
            <button class="btn btn-primary">WRITE REVIEW</button>
            <button class="btn btn-secondary">Follow</button>
          </div>
        </div>
  
        <div class="footer-nav">
          <div id="overview" class="nav-item active">Overview</div>
          <div id="review" class="nav-item">Reviews <span class="badge">{{$reviewCount}}</span></div>
        </div>
        
        <div class="comp-comment">
            <div class="comp-cmt-form">
                <input type="text" placeholder="Write a comment...">
                <div class="rating">
                  <input type="radio" id="star1" name="rating" value="1">
                  <label for="star1"><i class="bi bi-star-fill"></i></label>
                  
                  <input type="radio" id="star2" name="rating" value="2">
                  <label for="star2"><i class="bi bi-star-fill"></i></label>
                  
                  <input type="radio" id="star3" name="rating" value="3">
                  <label for="star3"><i class="bi bi-star-fill"></i></label>
                  
                  <input type="radio" id="star4" name="rating" value="4">
                  <label for="star4"><i class="bi bi-star-fill"></i></label>
                  
                  <input type="radio" id="star5" name="rating" value="5">
                  <label for="star5"><i class="bi bi-star-fill"></i></label>
              </div>
                <button id="submit-cmt" class="btn btn-primary">Submit</button>
            </div>
            <div class="comp-cmt-">
              @foreach($reviews as $review)
                <div class="review-card">
                    <div class="review-header">
                        <img src="{{ Str::startsWith($review->user->image, 'http') ? $review->user->image : asset('assets/images/avatar/' . $review->user->image) }}" alt="Ảnh User" class="user-avatar">
                        <div>
                            <p class="user-name"><b>{{$review->user->full_name}}</b></p>
                            <p class="review-date">{{$review->created_at}}</p>
                            @for ($i = 1; $i <= 5; $i++)
                              @if ($i <= $review->rating)
                                  <i class="bi bi-star-fill"></i> 
                              @else
                                  <i style="color: gray" class="bi bi-star"></i> 
                              @endif
                            @endfor
                        </div>
                    </div>
                    <div   class="review-content">
                        <p>{{$review->comment_content}}</p>
                    </div>
                </div>
              @endforeach              
            </div>
        </div>
        <div class="footer-disclaimer">
          <p>Need a company update? Contact marketing@itviec.com with exact info and adjustments.</p>
        </div>
    </div>
    </footer>
</div>
@endsection
