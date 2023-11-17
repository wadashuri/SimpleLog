{!! Form::open(['route' => $slot_route, 'method' => $slot_method, 'files' => 'true']) !!}
<div class="row g-3 mb-3">
    <div class="col-12">
        {{ Form::label('project_id', 'プロジェクト', ['class' => 'form-label']) }}
        {{ Form::select('project_id', $projects, old('project_id', isset($slot_task->project_id) ? $slot_task->project_id : false), ['class' => 'form-select']) }}
    </div>
    <div class="col-12">
        <label>タスク名</label>
        {{ Form::text('title', isset($slot_task) ? $slot_task->title : null, [
            'class' => 'form-control group_border_none',
            'placeholder' => 'タスク名を入力してください',
            'id' => 'title'
        ]) }}
    </div>
    <div class="col-12">
        {{ Form::label('start', '開始日', ['class' => 'form-label']) }}
        {{ Form::input('dateTime-local', 'start', isset($slot_task->start) ? $slot_task->start : '', ['class' => 'form-control', 'step' => '1800']) }}
    </div>
    <div class="col-12">
        {{ Form::label('end', '終了日', ['class' => 'form-label']) }}
        {{ Form::input('dateTime-local', 'end', isset($slot_task->end) ? $slot_task->end : '', ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('status', '状態', ['class' => 'form-label']) }}
        {{ Form::select('status', StatusConstants::STATUS, isset($slot_task->status) ? $slot_task->status : '', ['class' => 'form-select']) }}
    </div>
    <div class="col-12 mt-0">
        <hr class="my-4">
        {{ Form::button('送信', ['class' => 'w-100 btn btn-primary btn-md','id' => 'saveButton']) }}
    </div>
</div>
{!! Form::close() !!}
