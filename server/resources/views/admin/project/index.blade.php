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
    <div class="table-responsive">
        <table class="table text-nowrap table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">顧客</th>
                    <th scope="col">顧客担当者</th>
                    <th scope="col">日付</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="align-middle">{{ $project->id }}</td>
                        <td class="align-middle">{{ $project->customer->name ?? '' }}</td>
                        <td class="align-middle">{{ $project->customer_manager ?? '' }}</td>
                        <td class="align-middle">{{ $project->date ?? '' }}</td>
                        <td class="align-middle">
                            <div class="btn-group me-2">
                                <a class="btn btn-sm btn-outline-success"
                                    href="{{ route('admin.project.show', $project->id) }}">
                                    <span data-feather="info"></span>
                                    詳細
                                </a>
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('admin.project.edit', $project->id) }}">
                                    <span data-feather="edit"></span>
                                    編集
                                </a>
                                {!! Form::open([
                                    'route' => ['admin.project.destroy', $project->id],
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
                @endforeach
            </tbody>
        </table>
    </div>
    @if (isset($projects))
        <h2>合計金額 : &yen;{{ number_format($sum_cost) }}</h2>
    @endif

    {{-- paginator --}}
    {{ $projects->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
@endsection
