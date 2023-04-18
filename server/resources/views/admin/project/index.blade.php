@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- search --}}
    @include('parts.project.search', [
        'slot_route' => ['admin.project.index'],
        'slot_method' => 'GET',
        'users' => $users,
        'customers' => $customers,
    ])

    {{-- header --}}
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom mt-3">
        <h2>プロジェクト</h2>
        <div class="btn-toolbar mb-2 mb-md-0 align-items-end">
            <div class="btn-group me-2">
                {!! Form::open(['route' => 'admin.project.export', 'method' => 'post']) !!}
                <button type="submit" class="btn btn-sm btn-outline-success">CSVエクスポート</button>
                <input type="hidden" name="search" value={{ request()->input('search', '') }}>
                <input type="hidden" name="customer_id" value={{ request()->input('customer_id', '') }}>
                <input type="hidden" name="start" value={{ request()->input('start', '') }}>
                <input type="hidden" name="end" value={{ request()->input('end', '') }}>
                {!! Form::close() !!}
            </div>
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('admin.project.create') }}">
                    <span data-feather="plus-circle"></span>
                    新規登録
                </a>
            </div>
        </div>
    </div>

    {{-- table --}}
    @include('parts.project.table')

    {{-- analytics --}}
    @include('parts.project.analytics')

    {{-- paginator --}}
    {{ $projects->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
@endsection
