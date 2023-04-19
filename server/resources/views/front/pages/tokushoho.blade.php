@extends('layouts.front.app')

@section('content')
    @include('front.include.content_header',[
    'title1' => 'Transaction',
    'main_title' => '特定商取引法に基づく表記',
  ])

  @include('front.include.tokushoho')

  @endsection