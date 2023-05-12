@extends('layouts.master.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">お知らせ</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('master.post.index') }}">
                <span data-feather="corner-down-left" class="svg_initial"></span>
                戻る
            </a>
        </div>
    </div>

    {!! Form::open(['route' => $slot_route, 'method' => $slot_method, 'files' => 'true']) !!}
    <div class="row g-3 mb-3">


        <div class="col-12">
            <label>カテゴリー</label>
            <div class="accordion mt-3" id="accordionUserGroup">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseUserGroup" aria-expanded="false" aria-controls="collapseUserGroup">
                            カテゴリー
                        </button>
                    </h2>
                    <div id="collapseUserGroup" class="accordion-collapse collapse" aria-labelledby="headingUserGroup"
                        data-bs-parent="#accordionUserGroup">
                        <div class="accordion-body">
                            <div class="js-group_box">
                                @foreach ($slot_categories as $category)
                                    <label class="col-3 mb-2">
                                        {{ Form::checkbox(
                                            'categories[]',
                                            $category->id,
                                            in_array(
                                                $category->id,
                                                old('categories', isset($slot_post) ? $slot_post->categories->pluck('id')->toArray() : []),
                                                true,
                                            ),
                                            ['class' => 'form-check-input'],
                                        ) }}
                                        {{ $category->name }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <label>タイトル</label>
            {{ Form::text('title', old('title', isset($slot_post) ? $slot_post->title : null), ['class' => 'form-control', 'required']) }}
        </div>

        <div class="col-12">
            <label>画像</label>
                    @isset($slot_post)
                        @if ($slot_post->image('image'))
                            <p>現在設定されているimage</p>
                            <img src="{{ $slot_post->image('image') }}">
                        @else
                            <p>画像が設定されていません</p>
                        @endif
                    @endisset
            {{ Form::file('post_image', ['class' => 'form-control']) }}
        </div>

        <div class="col-12">
            <label>コンテンツ<span class="text-danger">*</span></label>
            {{ Form::textarea('content', old('content', isset($slot_post) ? $slot_post->content : null), ['class' => 'form-control', 'required']) }}
        </div>


        <hr class="my-4">
        {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md']) }}
    </div>

    {!! Form::close() !!}
@endsection
