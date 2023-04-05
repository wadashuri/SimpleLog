@extends('layouts.user.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">タスク</h1>
    </div>

    {!! Form::open(['route' => 'user.task.store', request()->route('task'), 'method' => 'POST']) !!}
    <div class="row g-3 mb-3">
        <div class="col-12">
            {{ Form::label('project_id', 'プロジェクト', ['class' => 'form-label']) }}
            {{ Form::select('project_id', $projects, false, ['class' => 'form-select', 'placeholder' => '未指定']) }}
        </div>
        <div class="col-12">
            <label>タスク名</label>
            {{ Form::text('name', null, [
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => 'タスク名を入力してください',
            ]) }}
        </div>
        <div class="col-12">
            {{ Form::label('published_at', '開始日', ['class' => 'form-label']) }}
            {{ Form::input('dateTime-local', 'published_at', null, ['class' => 'form-control']) }}
        </div>
        <div class="col-12">
            {{ Form::label('closed_at', '終了日', ['class' => 'form-label']) }}
            {{ Form::input('dateTime-local', 'closed_at', null, ['class' => 'form-control']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('status', '状態', ['class' => 'form-label']) }}
            {{ Form::select(
                'status',
                StatusConstants::STATUS,
                '0', 
                ['class' => 'form-select'],
            ) }}
        </div>
        <div class="col-12 mt-0">
            <hr class="my-4">
            {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md']) }}
        </div>
    </div>

    {!! Form::close() !!}

        <div class="table-responsive">
            <table class="table text-nowrap table-hover">
                <thead>
                    <tr>
                        <th scope="col">タスク名</th>
                        <small class="text-danger">※タスク名はクリックで編集が出来ます</small>
                        <th scope="col">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="align-middle col-7">
                                {{ Form::open([
                                    'route' => ['user.task.update', [$task->id]],
                                    'method' => 'PUT',
                                ]) }}
                                {{ Form::select('project_id', $projects, old('project_id', isset($task->project_id) ? $task->project_id : false), ['class' => 'form-select', 'placeholder' => '未指定']) }}

                                {{ Form::text('name', $task->name, [
                                    'class' => 'form-control group_border_none',
                                    'placeholder' => 'タスク名を入力してください',
                                ]) }}
                                {{ Form::select(
                                    'status',
                                    StatusConstants::STATUS, $task->status,
                                    ['class' => 'form-select'],
                                ) }}
                                {{ Form::input('dateTime-local', 'published_at', isset($task->published_at) ? $task->published_at : '', ['class' => 'form-control']) }}
                                {{ Form::input('dateTime-local', 'closed_at', isset($task->closed_at) ? $task->closed_at : '', ['class' => 'form-control']) }}
                                {{ Form::close() }}
                            </td>
                            <td class="align-middle col-5">
                                <div class="d-flex gap-2">
                                    <span>
                                        {{ Form::open([
                                            'route' => ['user.task.destroy', [$task->id]],
                                            'method' => 'DELETE',
                                            'onsubmit' => 'return confirm("本当に削除しますか?")',
                                        ]) }}
                                        {{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- paginator --}}
            {{ $tasks->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
        </div>
@endsection
