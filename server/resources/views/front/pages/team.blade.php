@extends('layouts.front.app')

@section('content')
    @include('front.include.content_header', [
        'title1' => 'Profile',
        'main_title' => 'プロフィール',
    ])

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2 class="mb-3">プロフィール</h2>
                    {{-- <span class="subheading">Our Expert &amp; Well Experience Staff</span> --}}
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 d-flex mb-sm-4 ftco-animate justify-content-center">
                    <div class="staff">
                        <div class="img mb-4" style="background-image: url(images/person_1.jpg);"></div>
                        <div class="info text-left">
                            <h3><a href="teacher-single.html">和田 朱利</a></h3>
                            <span class="position">代表, プログラマー</span>
                            <div class="text">
                                <p>高校卒業後、韓国に留学し、アイドルの練習生として過ごす。<br>その後、事務所との方向性の違いにより退社し、日本に帰国。名古屋で一年間プログラマーとして働いた後、東京の上場企業に就職。</p>
                                    <p>自分の持っている Web と音楽を制作できるスキルで、より良いものを作り、自分と周りを幸せにしていきたいという思いから、SincerityLab
                                    を開業。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-3 d-flex mb-sm-4 ftco-animate">
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
          </div> --}}
            </div>
            {{-- <div class="row  mt-5 justify-conten-center">
                <div class="col-md-8 ftco-animate">
                    <p>※5プロジェクト30ユーザーまでのスタータープラン（¥2,970/月）もご用意しています。　30日間の無料トライアルはこちら。
                        ※Nulab Pass(有料)で、下記機能を導入できます。
                        ・SAML認証：お使いのIDプロバイダー経由でBacklogのアカウントを認証できます。
                        ・監査ログ：組織内のBacklogユーザーの操作内容を記録情報としてダウンロードできます。</p>
                </div>
            </div> --}}
        </div>
    </section>

    {{-- newsletter --}}
    {{-- @include('front.include.newsletter') --}}
@endsection
