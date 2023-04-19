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
          <p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
        </div>
        <div class="col-md-3">
          <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
        </div>
        <div class="col-md-3">
          <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
        </div>
        <div class="col-md-3">
          <p><span>Website</span> <a href="#">yoursite.com</a></p>
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
        <div class="col-md-6" id="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4612.747205838796!2d136.92050180103385!3d35.16398149207498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sja!2sjp!4v1681695112299!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>
@endsection
