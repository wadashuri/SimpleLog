@extends('layouts.front.app')

@section('content')

  @include('front.include.content_header',[
    'title1' => 'Pricing',
    'main_title' => '価格',
  ])

  @include('front.include.pricing')

@endsection