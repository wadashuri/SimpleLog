@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">グループ管理</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('admin.group.create') }}">
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
                    <th scope="col">グループ名</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td class="align-middle">{{ $group->name }}</td>
                        <td class="align-middle">
                            <div class="btn-group me-2">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.group.edit', $group->id) }}">
                                    <span data-feather="edit"></span>
                                    編集
                                </a>
                                {!! Form::open(['route' => ['admin.group.destroy', $group->id], 'method' => 'delete', 'class' => 'btn-group']) !!}
                                    {!! Form::button('<span data-feather="trash"></span>削除', [
                                        'type' => 'submit', 'class' => 'btn btn-sm btn-outline-danger', 'onclick' => "if(!confirm('削除をしてもよろしいですか？')) return false;"
                                    ]) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- paginator --}}
    {{ $groups->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
@endsection