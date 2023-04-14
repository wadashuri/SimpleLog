@extends('layouts.front.app')

@section('content')
    @include('front.include.content_header',[
    'title1' => 'Team',
    'main_title' => 'チーム',
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
              <p>※5プロジェクト30ユーザーまでのスタータープラン（¥2,970/月）もご用意しています。　30日間の無料トライアルはこちら。
※Nulab Pass(有料)で、下記機能を導入できます。
・SAML認証：お使いのIDプロバイダー経由でBacklogのアカウントを認証できます。
・監査ログ：組織内のBacklogユーザーの操作内容を記録情報としてダウンロードできます。</p>
          </div>
      </div>
    </div>
  </section>

{{-- newsletter --}}
{{-- @include('front.include.newsletter') --}}
@endsection