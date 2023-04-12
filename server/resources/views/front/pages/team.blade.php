@extends('layouts.front.app')

@section('content')
    @include('front.include.content_header',[
    'title1' => 'Team',
    'main_title' => 'Team',
  ])

  <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2 class="mb-3">Our Staff</h2>
          <span class="subheading">Our Expert &amp; Well Experience Staff</span>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
              <div class="staff">
                    <div class="img mb-4" style="background-image: url(images/person_1.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Tom Smith</a></h3>
                        <span class="position">CO Founder, Web Developer</span>
                        <div class="text">
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      </div>
                    </div>
              </div>
          </div>
          <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
              <div class="staff">
                    <div class="img mb-4" style="background-image: url(images/person_2.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Mark Wilson</a></h3>
                        <span class="position">Web Developer</span>
                        <div class="text">
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      </div>
                    </div>
              </div>
          </div>
          <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
              <div class="staff">
                    <div class="img mb-4" style="background-image: url(images/person_3.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Patrick Jacobson</a></h3>
                        <span class="position">Web Designer</span>
                        <div class="text">
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      </div>
                    </div>
              </div>
          </div>
          <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
              <div class="staff">
                    <div class="img mb-4" style="background-image: url(images/person_4.jpg);"></div>
                    <div class="info text-center">
                        <h3><a href="teacher-single.html">Ivan Dorchsner</a></h3>
                        <span class="position">System Analyst</span>
                        <div class="text">
                          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                      </div>
                    </div>
              </div>
          </div>
      </div>
      <div class="row  mt-5 justify-conten-center">
          <div class="col-md-8 ftco-animate">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi vero accusantium sunt sit aliquam ipsum molestias autem perferendis, incidunt cumque necessitatibus cum amet cupiditate, ut accusamus. Animi, quo. Laboriosam, laborum.</p>
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