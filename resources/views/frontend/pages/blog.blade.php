@extends('frontend.layouts.master')

@section('content')
  {{-- ===========================
        BREADCRUMB START
    =========================== --}}
  <section class="wsus__breadcrumb" style="background: url({{ asset('frontend/assets/images/breadcrumb_bg.jpg') }});">
    <div class="wsus__breadcrumb_overlay">
      <div class="container">
        <div class="row">
          <div class="col-12 wow fadeInUp">
            <div class="wsus__breadcrumb_text">
              <h1>Blogs</h1>
              <ul>
                <li><a href="#">Home</a></li>
                <li>Blogs</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  {{-- ===========================
        BREADCRUMB END
    ============================ --}}

  {{-- ===========================
        BLOG PAGE START
    ============================ --}}
  <section class="wsus__blog_page mt_95 xs_mt_75 pb_120 xs_pb_100">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 wow fadeInUp">
          <div class="wsus__single_blog_4">
            <a class="wsus__single_blog_4_img" href="#">
              <img
                class="img-fluid"
                src="{{ asset('frontend/assets/images/blog_4_img_1.jpg') }}"
                alt="Blog"
              >
              <span class="date">March 23, 2024</span>
            </a>
            <div class="wsus__single_blog_4_text">
              <ul>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/user_icon_black.png') }}"
                      alt="User"
                    ></span>
                  By Richard Tea
                </li>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/comment_icon_black.png') }}"
                      alt="Comment"
                    ></span>
                  3 Comments
                </li>
              </ul>
              <a class="title" href="#">Exploring Learning Landscapes in Academic.</a>
              <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
              <a class="common_btn" href="#">Read More <i class="far fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 wow fadeInUp">
          <div class="wsus__single_blog_4">
            <a class="wsus__single_blog_4_img" href="#">
              <img
                class="img-fluid"
                src="{{ asset('frontend/assets/images/blog_4_img_2.jpg') }}"
                alt="Blog"
              >
              <span class="date">April 28, 2024</span>
            </a>
            <div class="wsus__single_blog_4_text">
              <ul>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/user_icon_black.png') }}"
                      alt="User"
                    ></span>
                  By Doug Lyphe
                </li>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/comment_icon_black.png') }}"
                      alt="Comment"
                    ></span>
                  21 Comments
                </li>
              </ul>
              <a class="title" href="#">Uncovering Learning Opportunities in Academia.</a>
              <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
              <a class="common_btn" href="#">Read More <i class="far fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 wow fadeInUp">
          <div class="wsus__single_blog_4">
            <a class="wsus__single_blog_4_img" href="#">
              <img
                class="img-fluid"
                src="{{ asset('frontend/assets/images/blog_4_img_3.jpg') }}"
                alt="Blog"
              >
              <span class="date">Jan 12, 2024</span>
            </a>
            <div class="wsus__single_blog_4_text">
              <ul>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/user_icon_black.png') }}"
                      alt="User"
                    ></span>
                  By Eleanor Fant
                </li>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/comment_icon_black.png') }}"
                      alt="Comment"
                    ></span>
                  48 Comments
                </li>
              </ul>
              <a class="title" href="#">Internationally Distinguished Skillful Educators.</a>
              <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
              <a class="common_btn" href="#">Read More <i class="far fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 wow fadeInUp">
          <div class="wsus__single_blog_4">
            <a class="wsus__single_blog_4_img" href="#">
              <img
                class="img-fluid"
                src="{{ asset('frontend/assets/images/blog_4_img_4.jpg') }}"
                alt="Blog"
              >
              <span class="date">April 28, 2024</span>
            </a>
            <div class="wsus__single_blog_4_text">
              <ul>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/user_icon_black.png') }}"
                      alt="User"
                    ></span>
                  By Doug Lyphe
                </li>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/comment_icon_black.png') }}"
                      alt="Comment"
                    ></span>
                  21 Comments
                </li>
              </ul>
              <a class="title" href="#">Uncovering Learning Opportunities in Academia.</a>
              <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
              <a class="common_btn" href="#">Read More <i class="far fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 wow fadeInUp">
          <div class="wsus__single_blog_4">
            <a class="wsus__single_blog_4_img" href="#">
              <img
                class="img-fluid"
                src="{{ asset('frontend/assets/images/blog_4_img_1.jpg') }}"
                alt="Blog"
              >
              <span class="date">March 23, 2024</span>
            </a>
            <div class="wsus__single_blog_4_text">
              <ul>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/user_icon_black.png') }}"
                      alt="User"
                    ></span>
                  By Richard Tea
                </li>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/comment_icon_black.png') }}"
                      alt="Comment"
                    ></span>
                  3 Comments
                </li>
              </ul>
              <a class="title" href="#">Exploring Learning Landscapes in Academic.</a>
              <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
              <a class="common_btn" href="#">Read More <i class="far fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 wow fadeInUp">
          <div class="wsus__single_blog_4">
            <a class="wsus__single_blog_4_img" href="#">
              <img
                class="img-fluid"
                src="{{ asset('frontend/assets/images/blog_4_img_2.jpg') }}"
                alt="Blog"
              >
              <span class="date">April 28, 2024</span>
            </a>
            <div class="wsus__single_blog_4_text">
              <ul>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/user_icon_black.png') }}"
                      alt="User"
                    ></span>
                  By Doug Lyphe
                </li>
                <li>
                  <span><img
                      class="img-fluid"
                      src="{{ asset('frontend/assets/images/comment_icon_black.png') }}"
                      alt="Comment"
                    ></span>
                  21 Comments
                </li>
              </ul>
              <a class="title" href="#">Uncovering Learning Opportunities in Academia.</a>
              <p>Suspends dictum sed sem allium convallis Proin dictum ipsum.</p>
              <a class="common_btn" href="#">Read More <i class="far fa-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="wsus__pagination mt_50 wow fadeInUp">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            <li class="page-item">
              <a
                class="page-link"
                href="#"
                aria-label="Previous"
              >
                <i class="far fa-arrow-left"></i>
              </a>
            </li>
            <li class="page-item"><a class="page-link active" href="#">01</a></li>
            <li class="page-item"><a class="page-link" href="#">02</a></li>
            <li class="page-item"><a class="page-link" href="#">03</a></li>
            <li class="page-item">
              <a
                class="page-link"
                href="#"
                aria-label="Next"
              >
                <i class="far fa-arrow-right"></i>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </section>
  {{-- ===========================
        BLOG PAGE END
    ============================ --}}
@endsection
