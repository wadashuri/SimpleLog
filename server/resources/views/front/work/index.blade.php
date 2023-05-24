@extends('layouts.front.app')

@section('content')
@include('front.include.content_header',[
    'title1' => 'Work',
    'main_title' => '事業内容',
  ])

{{-- 事業内容 --}}
@include('front.include.work',['works' => $works])


{{-- newsletter --}}
{{-- @include('front.include.newsletter') --}}
@endsection