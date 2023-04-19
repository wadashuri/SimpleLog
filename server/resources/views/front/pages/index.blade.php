@extends('layouts.front.app')

@section('content')
<div class="hero-wrap">
    <div class="overlay"></div>
    <div class="container-fluid">
      <div class="slider-text d-md-flex align-items-center" data-scrollax-parent="true">

        <div class="one-forth ftco-animate align-self-md-center" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4"> シンプルで
            <strong class="typewrite" data-period="4000" data-type='[ "必要最低限の項目で 稼働", "洗礼されたデザイン", "直感的に 使える", "あなたのビジネスを 効率化" ]'>
              <span class="wrap"></span>
            </strong>
          </h1>
          <p class="mb-md-5 mb-sm-3" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">進捗状況と作業時間を確認することで業務の偏りなどをおさえビジネスの効率化を図ります</p>
          <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
            {{-- <a href="#" class="btn btn-primary px-4 py-3">資料<br>ダウンロード</a> --}}
             <a href="#plans" class="btn btn-primary btn-outline-primary px-4 py-3">無料で<br>SimpleLogを試してみる</a>
            </p>
        </div>
        <div class="one-half align-self-md-end align-self-sm-center">
            <div class="slider-carousel owl-carousel">
                <div class="item">
                    <img src="images/dashboard_full_2.png" class="img-fluid img"alt="">
                </div>
                <div class="item">
                    <img src="images/dashboard_full_3.png" class="img-fluid img"alt="">
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-section-2">
      <div class="overlay"></div>
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <h3 class="heading-white">高品質なサービスをお届けすることをお約束します</h3>
              </div>
          </div>
      </div>
  </section>

  @include('front.include.services')

  {{-- counter --}}
  {{-- @include('front.include.counter') --}}

  {{-- 事業内容 --}}
  @include('front.include.work')

  @include('front.include.pricing')

  {{-- 資料請求 --}}
  {{-- <section class="ftco-quote">
      <div class="container">
          <div class="row">
              <div class="col-md-6 pr-md-5 aside-stretch py-5 choose">
                  <div class="heading-section heading-section-white mb-5 ftco-animate">
              <h2 class="mb-2">私たちを選ぶ理由</h2>
            </div>
            <div class="ftco-animate">
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar. Because there were thousands of bad Commas, wild Question Marks and devious Semikoli</p>
                <ul class="un-styled my-5">
                    <li><span class="icon-check"></span>Consectetur adipisicing elit</li>
                    <li><span class="icon-check"></span>Adipisci repellat accusamus</li>
                    <li><span class="icon-check"></span>Tempore reprehenderit vitae</li>
                </ul>
            </div>
              </div>
              <div class="col-md-6 py-5 pl-md-5">
                  <div class="heading-section mb-5 ftco-animate">
              <h2 class="mb-2">お問い合わせ</h2>
            </div>
            <form action="#" class="ftco-animate">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Full Name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Phone">
                    </div>
                  </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Website">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="submit" value="資料請求" class="btn btn-primary py-3 px-5">
                    </div>
                </div>
            </div>
          </form>
              </div>
          </div>
      </div>
  </section> --}}

{{-- ユーザーの声 --}}
{{-- @include('front.include.testimony') --}}


{{-- メルマガ --}}
{{-- @include('front.include.newsletter') --}}

  {{-- <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <h2 class="mb-2">Latest Blog</h2>
          <span class="subheading">Read our blog</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
            <a href="/front/blog_single" class="block-20" style="background-image: url('images/image_1.jpg');">
            </a>
            <div class="text py-4">
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
            <a href="/front/blog_single" class="block-20" style="background-image: url('images/image_2.jpg');">
            </a>
            <div class="text py-4">
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
            <a href="/front/blog_single" class="block-20" style="background-image: url('images/image_3.jpg');">
            </a>
            <div class="text py-4">
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
    </div>
  </section> --}}
@endsection