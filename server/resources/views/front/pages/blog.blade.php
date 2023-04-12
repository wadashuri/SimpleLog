@extends('layouts.front.app')

@section('content')
  @include('front.include.content_header',[
    'title1' => 'Blog',
    'main_title' => 'Our Blog',
  ])

  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
            <a href="lp/blog_single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry" data-aos-delay="100">
            <a href="lp/blog_single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
            </a>
            <div class="text p-4">
              <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry" data-aos-delay="200">
            <a href="lp/blog_single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
            </a>
            <div class="text p-4">
              <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
            <a href="lp/blog_single.html" class="block-20" style="background-image: url('images/image_4.jpg');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry" data-aos-delay="100">
            <a href="lp/blog_single.html" class="block-20" style="background-image: url('images/image_5.jpg');">
            </a>
            <div class="text p-4">
              <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            </div>
          </div>
        </div>
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry" data-aos-delay="200">
            <a href="lp/blog_single.html" class="block-20" style="background-image: url('images/image_6.jpg');">
            </a>
            <div class="text p-4">
              <div class="meta mb-3">
                <div><a href="#">August 12, 2018</a></div>
                <div><a href="#">Admin</a></div>
                <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
              </div>
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2>Subcribe to our Newsletter</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
            <div class="row d-flex justify-content-center mt-5">
              <div class="col-md-8">
                <form action="#" class="subscribe-form">
                  <div class="form-group d-flex">
                    <input type="text" class="form-control" placeholder="Enter email address">
                    <input type="submit" value="Subscribe" class="submit px-3">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection