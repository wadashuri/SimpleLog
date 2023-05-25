@extends('layouts.front.app')

@section('content')
@include('front.include.content_header',[
    'title1' => 'Contact',
    'main_title' => 'お問い合わせ',
  ])
    <!-- メインコンテンツ-->
    <section class="ftco-section contact-section ftco-degree-bg">
    <div class="container">
      <div class="row d-flex mb-5 contact-info">
        <div class="col-md-12 mb-4">
          <h2 class="h4">お問い合わせ</h2>
        </div>
        <div class="w-100"></div>
        <div class="col-md-3">
          <p><span>住所:</span>神奈川県横浜市西区戸部町２丁目４７</p>
        </div>
        <div class="col-md-3">
          <p><span>電話番号:</span> <a href="tel://07085815236">070-8581-5236</a></p>
        </div>
        <div class="col-md-3">
          <p><span>メール:</span> <a href="mailto:info@sinceritylab.com">info@sinceritylab.com</a></p>
        </div>
      </div>
      <div class="row block-9">
        <div class="col-md-6 pr-md-5">
          {!! Form::open(['route' => $slot_route, 'method' => 'post']) !!}
            @isset($slot_content_select)
            <div class="form-group">
                お問い合わせ内容の選択
              {{ $slot_content_select }}
            </div>
            @endisset
            <div class="form-group">
                お名前
              {{ $slot_name }}
            </div>
            <div class="form-group">
                フリガナ
              {{ $slot_ruby }}
            </div>
            <div class="form-group">
                メールアドレス
              {{ $slot_email }}
            </div>
            <div class="form-group">
                お問い合わせ内容
              {{ $slot_content }}
            </div>
          {{ $slot_hidden ?? '' }}
                    {{ $slot_button }}
                    {!! Form::close() !!}

        </div>

        {{-- ここにGoogleマップ表示 --}}
        <div class="col-md-6 embed-responsive embed-responsive-16by9 mt-5" id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d812.5312597386795!2d139.6239114219187!3d35.45169873622236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60185c64343a0897%3A0x501676f79f8e122a!2z44CSMjIwLTAwNDIg56We5aWI5bed55yM5qiq5rWc5biC6KW_5Yy65oi46YOo55S677yS5LiB55uu77yU77yX!5e0!3m2!1sja!2sjp!4v1684973453450!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>
@endsection
