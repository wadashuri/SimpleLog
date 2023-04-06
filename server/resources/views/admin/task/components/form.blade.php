@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">タスク</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.task.index') }}">
                <span data-feather="corner-down-left" class="svg_initial"></span>
                戻る
            </a>
        </div>
    </div>

    {!! Form::open(['route' => $slot_route, 'method' => $slot_method, 'files' => 'true']) !!}
    <div class="row g-3 mb-3">
        <div class="col-12">
            {{ Form::label('project_id', 'プロジェクト', ['class' => 'form-label']) }}
            {{ Form::select('project_id', $projects, old('project_id', isset($slot_task->project_id) ? $slot_task->project_id : false), ['class' => 'form-select', 'placeholder' => '未指定']) }}
        </div>
        <div class="col-12">
            <label>タスク名</label>
            {{ Form::text('name', isset($slot_task) ? $slot_task->name : null, [
                'class' => 'form-control group_border_none',
                'placeholder' => 'タスク名を入力してください',
            ]) }}
        </div>
        <div class="col-12">
            {{ Form::label('published_at', '開始日', ['class' => 'form-label']) }}
            {{ Form::input('dateTime-local', 'published_at', isset($slot_task->published_at) ? $slot_task->published_at : '', ['class' => 'form-control']) }}
        </div>
        <div class="col-12">
            {{ Form::label('closed_at', '終了日', ['class' => 'form-label']) }}
            {{ Form::input('dateTime-local', 'closed_at', isset($slot_task->closed_at) ? $slot_task->closed_at : '', ['class' => 'form-control']) }}
        </div>
        <div class="mb-3">
            {{ Form::label('status', '状態', ['class' => 'form-label']) }}
            {{ Form::select('status', StatusConstants::STATUS, isset($slot_task->status) ? $slot_task->status : '', ['class' => 'form-select']) }}
        </div>
        <div class="col-12 mt-0">
            <hr class="my-4">
            {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md']) }}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
