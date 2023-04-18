@extends('layouts.user.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- search --}}
    @include('parts.project.search',[
        'slot_route' => ['user.project.index'],
        'slot_method' => 'GET',
        'users' => $users,
        'customers' => $customers
    ])

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">プロジェクト管理</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('user.project.create') }}">
                <span data-feather="plus-circle"></span>
                新規登録
            </a>
        </div>
    </div>

    {{-- table --}}
    @include('parts.project.table')

    {{-- analytics --}}
    @include('parts.project.analytics')

    {{-- paginator --}}
    {{ $projects->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
@endsection