@extends('layouts.front.app')

@section('content')
@include('front.include.content_header',[
    'title1' => 'Work',
    'main_title' => '実績',
  ])

  <section class="ftco-section ftco-work">
      <div class="container-fluid">
          <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2 class="mb-2">Our Portfolio</h2>
          <span class="subheading">We're Happy to share our complete Projects</span>
        </div>
      </div>
      <div class="row">
          <div class="col-md-4 ftco-animate">
              <div class="work-entry">
                  <a href="#" class="img" style="background-image: url(images/work-1.jpg);">
                      <div class="text d-flex justify-content-center align-items-center">
                          <div class="p-3">
                              <span>Branding</span>
                              <h3>Work 01</h3>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-md-4 ftco-animate">
              <div class="work-entry">
                  <a href="#" class="img" style="background-image: url(images/work-2.jpg);">
                      <div class="text d-flex justify-content-center align-items-center">
                          <div class="p-3">
                              <span>Branding</span>
                              <h3>Work 02</h3>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-md-4 ftco-animate">
              <div class="work-entry">
                  <a href="#" class="img" style="background-image: url(images/work-3.jpg);">
                      <div class="text d-flex justify-content-center align-items-center">
                          <div class="p-3">
                              <span>Branding</span>
                              <h3>Work 03</h3>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-md-4 ftco-animate">
              <div class="work-entry">
                  <a href="#" class="img" style="background-image: url(images/work-4.jpg);">
                      <div class="text d-flex justify-content-center align-items-center">
                          <div class="p-3">
                              <span>Branding</span>
                              <h3>Work 01</h3>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-md-4 ftco-animate">
              <div class="work-entry">
                  <a href="#" class="img" style="background-image: url(images/work-5.jpg);">
                      <div class="text d-flex justify-content-center align-items-center">
                          <div class="p-3">
                              <span>Branding</span>
                              <h3>Work 02</h3>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
          <div class="col-md-4 ftco-animate">
              <div class="work-entry">
                  <a href="#" class="img" style="background-image: url(images/work-6.jpg);">
                      <div class="text d-flex justify-content-center align-items-center">
                          <div class="p-3">
                              <span>Branding</span>
                              <h3>Work 03</h3>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
      </div>
      </div>
  </section>


{{-- newsletter --}}
{{-- @include('front.include.newsletter') --}}
@endsection