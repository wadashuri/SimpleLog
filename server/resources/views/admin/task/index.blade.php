@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">タスク一覧</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('admin.task.create') }}">
                <span data-feather="plus-circle"></span>
                新規登録
            </a>
        </div>
    </div>

    {{-- table --}}
    <div class="table-responsive">
        <task-calendar-common :events='@json($tasks)'></task-calendar-common>
        <table class="table text-nowrap table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">名前</th>
                    <th scope="col">開始/終了</th>
                    <th scope="col">状態</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td class="align-middle">{{ $task->title }}</td>
                        <td class="align-middle">{{ $task->start }}/{{ $task->end }}</td>
                        <td class="align-middle">
                            <span class="{{ StatusConstants::COLOR[$task->status] }}">
                                {{ StatusConstants::STATUS[$task->status] }}
                            </span>
                        </td>
                        <td class="align-middle">
                            <div class="btn-group me-2">
                                <a class="btn btn-sm btn-outline-success" href="{{ route('admin.task.show', $task->id) }}">
                                    <span data-feather="info"></span>
                                    詳細
                                </a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.task.edit', $task->id) }}">
                                    <span data-feather="edit"></span>
                                    編集
                                </a>
                                {!! Form::open([
                                    'route' => ['admin.task.destroy', $task->id],
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
                    <p>タスクが登録されていません</p>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- paginator --}}
    {{ $tasks->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
@endsection
