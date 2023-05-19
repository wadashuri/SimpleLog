@extends('layouts.front.app')

@section('content')
@include('front.include.content_header',[
    'title1' => 'Contact',
    'main_title' => '完了',
  ])
    <div class="container">
        <div class="signup u-mt50">
            <p class="u-txt_center u-mb60">お問い合わせありがとうございます。</p>
            <a href="{{ route('front.home') }}" class="btn_square">TOPに戻る</a>
        </div>
    </div>
@endsection