@extends('layouts.front.app')

@section('content')
  @include('front.include.content_header',[
    'title1' => 'News',
    'main_title' => 'お知らせ',
  ])
  <section class="ftco-section bg-light">
    <div class="container">
        @if(request()->input('category_name'))
        <div class="mb-3">
            <h4>検索結果：{{ $posts->count() }}件</h4>
            <p>カテゴリー：{{ request()->input('category_name') }}</p>
        </div>
        @endif
      <div class="row">
        @forelse($posts as $post)
        <a href="{{ route('front.post.show', $post->id) }}">
        <div class="col-md-4 ftco-animate">
          <div class="blog-entry">
            <a href="{{ route('front.post.show', $post->id) }}" class="block-20" style="background-image: url('{{ $post->image('image') }}');">
            </a>
            <div class="text p-4 d-block">
              <div class="meta mb-3">
                <div><a href="#">{{ $post->created_at }}</a></div><br>
                @foreach($post->categories as $category)
                  <h6><span class="badge bg-secondary text-white">{{ $category->name }}</span></h6>
                @endforeach
                {{-- <div><a href="#">Admin</a></div> --}}
                {{-- <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> --}}
              </div>
              <h3 class="heading"><a href="#">{{ $post->title }}</a></h3>
            </div>
          </div>
        </div>
        </a>
        @empty
        <P>お知らせはありません</P>
        @endforelse
      </div>
      {{-- <div class="row mt-5">
        <div class="col text-center">
          <div class="block-27">
            <ul>
              <li><a href="#">&lt;</a></li>
              <li class="active"><span>1</span></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&gt;</a></li>
            </ul>
          </div>
        </div>
      </div> --}}
    {{-- paginator --}}
    {{ $posts->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
    </div>
  </section>
{{-- newsletter --}}
{{-- @include('front.include.newsletter') --}}
@endsection