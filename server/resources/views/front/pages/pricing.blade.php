@extends('layouts.front.app')

@section('content')

  @include('front.include.content_header',[
    'title1' => 'Pricing',
    'main_title' => 'Pricing',
  ])

  @include('front.include.pricing')

@endsection