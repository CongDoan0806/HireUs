@extends('Layout.master')
@section('content')
<div class="comp-detail-page">
    <header class="comp_main-header">
      <div class="comp_container header-container">
        <div class="company-info">
          <div class="company-logo">
            <img src="assets/images/companies/cmc_logo.png" alt="ThoughtWorks Vietnam Logo">
          </div>
          <div class="company-details">
            <h1>ThoughtWorks Vietnam</h1>
            <p>Ho Chi Minh</p>
          </div>
        </div>
        <div class="company-actions">
          <div class="rating-badge">
            <div class="rating-score">4.9</div>
            <div class="rating-stars">
              <div class="stars-container">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <div class="rating-count">(16 reviews)</div>
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
              <div class="rating-score-large">4.9</div>
              <div class="stars-large">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <div class="rating-count-large">(16 reviews)</div>
              <div class="rating-distribution">
                <div class="rating-row">
                  <div class="rating-label">5★</div>
                  <div class="rating-bar-container">
                    <div class="rating-bar" style="width: 88%"></div>
                  </div>
                  <div class="rating-percentage">88%</div>
                </div>
                <div class="rating-row">
                  <div class="rating-label">4★</div>
                  <div class="rating-bar-container">
                    <div class="rating-bar" style="width: 12%"></div>
                  </div>
                  <div class="rating-percentage">12%</div>
                </div>
                <div class="rating-row">
                  <div class="rating-label">3★</div>
                  <div class="rating-bar-container">
                    <div class="rating-bar" style="width: 0%"></div>
                  </div>
                  <div class="rating-percentage">0%</div>
                </div>
                <div class="rating-row">
                  <div class="rating-label">2★</div>
                  <div class="rating-bar-container">
                    <div class="rating-bar" style="width: 0%"></div>
                  </div>
                  <div class="rating-percentage">0%</div>
                </div>
                <div class="rating-row">
                  <div class="rating-label">1★</div>
                  <div class="rating-bar-container">
                    <div class="rating-bar" style="width: 0%"></div>
                  </div>
                  <div class="rating-percentage">0%</div>
                </div>
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
              <img src="./public/assets/icons/robby-apply.svg" alt="Review robot icon">
            </div>
            <div class="prompt-text">
              <h3>Please take a minute to share your work experience at ThoughtWorks Vietnam</h3>
              <div class="rating-input">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <span class="rating-hint">Click a star to start reviewing</span>
              </div>
              <div class="review-info">Your review for ThoughtWorks Vietnam will be submitted anonymously.</div>
            </div>
          </div>
        </section>
  
        <section class="reviews-section">
          <h2 class="reviews-heading">16 employee reviews</h2>
  
          <div class="review-card">
            <div class="review-date">Posted 1 August</div>
            <div class="review-title">Good working environment & benefits</div>
            <div class="review-rating">
              <div class="stars-container">
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
                <i class="bi bi-star-fill"></i>
              </div>
              <div class="review-recommend">
                <img src="./public/assets/icons/good-feedback.svg" alt="Recommend">
                <span>Recommend</span>
              </div>
            </div>
            <div class="review-content">
              <p>I had a blast with the Thoughtworks! Forget about typical interview questions that just test your theoretical knowledge. They focus on digging into your real-world experience to see how well you're with the problems. The interviewers were friendly and really engaging.</p>
              <p>Compensation & Benefits: You'll earn a competitive salary plus a comprehensive benefits package.</p>
              <ul>
                <li>Transparency & Respect: You'll work alongside colleagues from all over the world, using English 100% of the time.</li>
                <li>Team: Supportive! Get ready for a fun and collaborative work environment where everyone helps each other.</li>
                <li>Professional Development: The company respects your individual preferences, strengths, and career goals. They encourage to self-actualize and provide lots of learning opportunities. They provide all the necessary resources and budget to help you reach your goals (books/courses, paid time for online certification courses, budget to take certification exams, and even a default Udemy subscription for everyone).</li>
                <li>Perks: You'll have flexible holiday policy and the option to work remotely. With the rise of your time spent working remotely.</li>
              </ul>
              <div class="review-improvement">
                <h4>Suggestions for improvement:</h4>
                <ul>
                  <li>I'd love to see more continuous learning across different domains to work more efficiently.</li>
                  <li>Investing in more dedicated areas would be a good perk for employees.</li>
                </ul>
              </div>
            </div>
          </div>
  
          <div class="review-card">
            <div class="review-date">Posted from ThoughtWorks Vietnam</div>
            <div class="review-title">Thank you for your feedback. We're glad to hear about your positive experience at ThoughtWorks Vietnam.</div>
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
              <div class="review-recommend">
                <img src="./public/assets/icons/good-feedback.svg" alt="Recommend">
                <span>Recommend</span>
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
            <img src="assets/images/companies/cmc_logo.png" alt="ThoughtWorks Vietnam">
            <div class="company-name">ThoughtWorks Vietnam</div>
          </div>
          <div class="footer-actions">
            <button class="btn btn-primary">WRITE REVIEW</button>
            <button class="btn btn-secondary">Follow</button>
          </div>
        </div>
  
        <div class="footer-nav">
          <div id="overview" class="nav-item active">Overview</div>
          <div id="review" class="nav-item">Reviews <span class="badge">16</span></div>
          <div class="nav-item">Articles</div>
        </div>
        
        <div class="comp-comment">
            <div class="comp-cmt-form">
                <input type="text" placeholder="Write a comment...">
                <button id="submit-cmt" class="btn btn-primary">Submit</button>
            </div>
            <div class="comp-cmt-">
                <div class="review-card">
                    <div class="review-header">
                        <img src="assets/images/companies/cmc_logo.png" alt="Ảnh User" class="user-avatar">
                        <div>
                            <p class="user-name"><b>Nguyễn Văn A</b></p>
                            <p class="review-date">Tháng Ba 2025</p>
                        </div>
                    </div>
                    <div   class="review-content">
                        <p>Môi trường chuyên nghiệp với nhiều cơ hội phát triển Need a company update? Contact marketing@itviec.com with exact info and adjustments. Need a company update? Contact marketing@itviec.com with exact info and adjustments.</p>
                    </div>
                </div>
                <div class="review-card">
                    <div class="review-header">
                        <img src="assets/images/companies/cmc_logo.png" alt="Ảnh User" class="user-avatar">
                        <div>
                            <p class="user-name"><b>Nguyễn Văn A</b></p>
                            <p class="review-date">Tháng Ba 2025</p>
                        </div>
                    </div>
                    <div   class="review-content">
                        <p>Môi trường chuyên nghiệp với nhiều cơ hội phát triển Need a company update? Contact marketing@itviec.com with exact info and adjustments. Need a company update? Contact marketing@itviec.com with exact info and adjustments.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-disclaimer">
          <p>Need a company update? Contact marketing@itviec.com with exact info and adjustments.</p>
        </div>
    </div>
    </footer>
</div>
@endsection
