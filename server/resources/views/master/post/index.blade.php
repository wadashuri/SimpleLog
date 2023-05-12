@extends('layouts.master.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">お知らせ一覧</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('master.post.create') }}">
                <span data-feather="plus-circle"></span>
                新規登録
            </a>
        </div>
    </div>

    {{-- table --}}
    <div class="table-responsive">
        <table class="table text-nowrap table-hover">
            <thead>
                <tr>
                    <th scope="col">タイトル</th>
                    <th scope="col">コンテンツ</th>
                    <th scope="col">カテゴリー</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                    <tr>
                        <td class="align-middle">{{ $post->title }}</td>
                        <td class="align-middle">{{ $post->content }}</td>
                        <td class="align-middle">
                            @foreach($post->categories as $category)
                            <span class="badge bg-secondary">{{ $category->name }}</span>
                            @endforeach
                        </td>
                        <td class="align-middle">
                            <div class="btn-group me-2">
                                <a class="btn btn-sm btn-outline-success"
                                    href="{{ route('master.post.show', $post->id) }}">
                                    <span data-feather="info"></span>
                                    詳細
                                </a>
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('master.post.edit', $post->id) }}">
                                    <span data-feather="edit"></span>
                                    編集
                                </a>
                                {!! Form::open([
                                    'route' => ['master.post.destroy', $post->id],
                                    'method' => 'delete',
                                    'class' => 'btn-group',
                                ]) !!}
                                {!! Form::button('<span data-feather="trash"></span>削除', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-outline-danger',
                                    'onclick' => "if(!confirm('削除をしてもよろしいですか？')) return false;",
                                ]) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @empty
                    <p>お知らせが登録されていません</p>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- paginator --}}
    {{ $posts->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
@endsection
