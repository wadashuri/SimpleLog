{!! Form::open(['route' => $slot_route, 'method' => $slot_method, 'class' => 'order--toolbar mt-4']) !!}
    <div class="form-row d-flex flex-wrap align-items-end">
        {{-- フリーワード検索 --}}
        <div class="form-group col-12 col-md-2 me-3">
            {{ Form::label('search', 'フリーワード検索', ['class' => 'col-form-label']) }}
            {{ Form::text('search', request()->input('search', ''), ['class' => 'form-control', 'placeholder' => 'キーワードを入力してください']) }}
        </div>
        <div class="form-group col-12 col-md-1 me-3">
            {{-- 顧客選択 --}}
            {{ Form::label('customers', '顧客選択', ['class' => 'col-form-label']) }}
            {{ Form::select('customer_id', $customers, request()->input('customer_id', ''), ['class' => 'form-control', 'id' => 'customer', 'placeholder' => '顧客選択']) }}
        </div>

        <div class="form-group col-12 col-md-1 me-3">
            {{-- 開始期間 --}}
            {{ Form::label('start', '開始期間', ['class' => 'col-form-label']) }}
            {{ Form::input('date', 'start', request()->input('start', ''), ['class' => 'form-control']) }}
        </div>

        <div class="form-group col-12 col-md-1 me-3">
            {{-- 終了期間 --}}
            {{ Form::label('end', '終了期間', ['class' => 'col-form-label']) }}
            {{ Form::input('date', 'end', request()->input('end', ''), ['class' => 'form-control']) }}
        </div>

        <!-- 検索ボタン -->
        <div class="form-group col-12 col-md-1 me-3 mt-3">
            {{ Form::submit('検索', ['class' => 'btn btn-primary text-white form-control']) }}
        </div>
    </div>
    {!! Form::close() !!}