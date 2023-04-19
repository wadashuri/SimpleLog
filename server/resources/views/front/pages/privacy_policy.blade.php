@extends('layouts.front.app')

@section('content')
    @include('front.include.content_header',[
    'title1' => 'PrivacyPolicy',
    'main_title' => 'プライバシーポリシー',
  ])


  @include('front.include.privacy_policy')

  @endsection