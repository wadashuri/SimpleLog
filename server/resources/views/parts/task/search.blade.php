{!! Form::open(['route' => $slot_route, 'method' => $slot_method, 'class' => 'order--toolbar mt-4']) !!}
    <div class="form-row d-flex flex-wrap align-items-end">
        <div class="form-group col-12 col-md-1 me-3">
            {{-- 日付 --}}
            {{ Form::label('date', '日付', ['class' => 'col-form-label']) }}
            {{ Form::input('date', 'date', request()->input('date'), ['class' => 'form-control']) }}
        </div>
        <!-- 検索ボタン -->
        <div class="form-group col-12 col-md-1 me-3 mt-3">
            {{ Form::submit('検索', ['class' => 'btn btn-primary text-white form-control']) }}
        </div>
    </div>
    {!! Form::close() !!}