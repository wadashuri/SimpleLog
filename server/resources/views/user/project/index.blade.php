@extends('layouts.user.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

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
    <div class="table-responsive">
        <table class="table text-nowrap table-hover">
            <thead>
                <tr>
                    <th scope="col">顧客</th>
                    <th scope="col">顧客担当者</th>
                    <th scope="col">日付</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="align-middle">{{ $project->customer->name ??'' }}</td>
                        <td class="align-middle">{{ $project->customer_manager ??'' }}</td>
                        <td class="align-middle">{{ $project->date ??'' }}</td>
                        <td class="align-middle">
                            <div class="btn-group me-2">
                                <a class="btn btn-sm btn-outline-success" href="{{ route('user.project.show', $project->id) }}">
                                    <span data-feather="info"></span>
                                    詳細
                                </a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('user.project.edit', $project->id) }}">
                                    <span data-feather="edit"></span>
                                    編集
                                </a>
                                @can('administrator')
                                {!! Form::open(['route' => ['user.project.destroy', $project->id], 'method' => 'delete', 'class' => 'btn-group']) !!}
                                    {!! Form::button('<span data-feather="trash"></span>削除', [
                                        'type' => 'submit', 'class' => 'btn btn-sm btn-outline-danger', 'onclick' => "if(!confirm('削除をしてもよろしいですか？')) return false;"
                                    ]) !!}
                                {!! Form::close() !!}
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- paginator --}}
    {{ $projects->appends(request()->query())->links('vendor.pagination.bootstrap-4') }}
@endsection