@extends('layouts.front.app')

@section('content')
    @include('front.include.content_header',[
    'title1' => 'About',
    'main_title' => '会社概要',
  ])

  {{-- counter --}}
  {{-- @include('front.include.counter') --}}


  <section class="ftco-section">
      <div class="container">
          <div class="row d-md-flex">
              <div class="col-md-6 ftco-animate img about-image" style="background-image: url(images/about.jpg);">
              </div>
              <div class="col-md-6 ftco-animate p-md-5">
                  <div class="row">
                <div class="col-md-12 nav-link-wrap mb-5">
                  <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">What we do</a>

                    <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab" aria-controls="v-pills-mission" aria-selected="false">Our mission</a>

                    <a class="nav-link" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab" aria-controls="v-pills-goal" aria-selected="false">Our goal</a>
                  </div>
                </div>
                <div class="col-md-12 d-flex align-items-center">

                  <div class="tab-content ftco-animate" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel" aria-labelledby="v-pills-whatwedo-tab">
                        <div>
                          <h2 class="mb-4">We Offer High Quality Services</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                          </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-mission" role="tabpanel" aria-labelledby="v-pills-mission-tab">
                      <div>
                          <h2 class="mb-4">Exceptional Web Solutions</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                          </div>
                    </div>

                    <div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
                      <div>
                          <h2 class="mb-4">Help Our Customer</h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur</p>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </section>

  @include('front.include.testimony')

{{-- newsletter --}}
{{-- @include('front.include.newsletter') --}}
  @endsection