@extends('layouts.front.app')

@section('content')
  @include('front.include.content_header',[
    'title1' => 'Services',
    'main_title' => 'サービス',
  ])

  <section class="ftco-section ftco-services">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2 class="mb-2">お客様に満足いただけるサービスを提供することが、私たちの使命です。</h2>
          <span class="subheading">シンプルな操作で &amp; あなたのビジネスを効率化</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-research"></span></div></div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Market Research</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-creativity"></span></div></div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Business Strategy</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-market"></span></div></div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Audience Analytics</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-research"></span></div></div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Market Research</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-creativity"></span></div></div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Business Strategy</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-market"></span></div></div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Audience Analytics</h3>
              <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-wrap mt-5">
        <div class="row d-flex no-gutters">
            <div class="col-md-6 img ftco-animate" style="background-image: url(images/about.jpg);">
            </div>
            <div class="col-md-6 d-flex">
                <div class="services-wrap">
                    <div class="heading-section mb-5 ftco-animate">
                  <h2 class="mb-2">お客様に満足いただけるサービスを提供することが、私たちの使命です。</h2>
                  <span class="subheading">シンプルな操作であなたのビジネスを効率化します</span>
                </div>
                    <div class="list-services d-flex ftco-animate">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-pencil"></span>
                        </div>
                        <div class="text">
                            <h3>Logo Branding</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        </div>
                    </div>
                    <div class="list-services d-flex ftco-animate">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-web"></span>
                        </div>
                        <div class="text">
                            <h3>Development</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        </div>
                    </div>
                    <div class="list-services d-flex ftco-animate">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="icon-pie-chart"></span>
                        </div>
                        <div class="text">
                            <h3>Online Marketing</h3>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

{{-- newsletter --}}
{{-- @include('front.include.newsletter') --}}
@endsection