{!! Form::open(['route' => $slot_route, 'method' => $slot_method, 'files' => 'true', 'onsubmit' => 'return false;']) !!}
<div class="row g-3 mb-3">
    <div class="col-12">
        <label>タスク名</label>
        {!! nl2br(e(Form::textarea('title', isset($slot_task) ? $slot_task->title : null, [
            'class' => 'form-control group_border_none',
            'placeholder' => 'タスク名を入力してください',
            'id' => 'title'
        ]))) !!}
    </div>
    <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
              詳細設定
            </button>
          </h2>
          <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <div class="col-12">
                    {{ Form::label('project_id', 'プロジェクト', ['class' => 'form-label']) }}
                    {{ Form::select('project_id', $projects, old('project_id', isset($slot_task->project_id) ? $slot_task->project_id : false), ['class' => 'form-select', 'placeholder' => '未指定']) }}
                </div>
                <div class="col-12">
                    {{ Form::label('start', '開始日', ['class' => 'form-label']) }}
                    {{ Form::input('dateTime-local', 'start', isset($slot_task->start) ? $slot_task->start : '', ['class' => 'form-control']) }}
                </div>
                <div class="col-12">
                    {{ Form::label('end', '終了日', ['class' => 'form-label']) }}
                    {{ Form::input('dateTime-local', 'end', isset($slot_task->end) ? $slot_task->end : '', ['class' => 'form-control']) }}
                </div>
                <div class="mb-3">
                    {{ Form::label('status', '状態', ['class' => 'form-label']) }}
                    {{ Form::select('status', StatusConstants::STATUS, isset($slot_task->status) ? $slot_task->status : '', ['class' => 'form-select']) }}
                </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-12 mt-0 d-flex justify-content-center gap-1">
        <hr class="my-4">
        <div class="col-4">
            {{ Form::button('戻る', ['class' => 'w-100 btn btn-secondary btn-md','id' => 'back','data-bs-dismiss' => 'modal']) }}
        </div>
        <div class="col-4">
            {{ Form::button('送信', ['class' => 'w-100 btn btn-primary btn-md','id' => 'putForm','data-bs-dismiss' => 'modal']) }}
        </div>
        <div class="col-4">
            {{ Form::button('削除', ['class' => 'w-100 btn btn-danger btn-md','id' => 'delete','data-bs-dismiss' => 'modal']) }}
        </div>
    </div>
</div>
{!! Form::close() !!}