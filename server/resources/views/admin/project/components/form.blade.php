@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h1">プロジェクト</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.project.index') }}">
                <span data-feather="corner-down-left"></span>
                戻る
            </a>
        </div>
    </div>

    {!! Form::open(['route' => $slot_route, 'method' => $slot_method]) !!}
    <div class="row g-3 mb-3">

        <div class="col-12">
            {{ Form::label('name', 'プロジェクト名', ['class' => 'form-label']) }}
            {{ Form::text('name', isset($slot_project) ? $slot_project->name : '', [
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => 'プロジェクト名を入力してください',
            ]) }}
        </div>

        <div class="col-12">
            {{ Form::label('progress', '進捗', ['class' => 'form-label']) }}
            {{ Form::number('progress', isset($slot_project) ? $slot_project->cost : null, ['class' => 'form-control', 'min' => 1]) }}
        </div>

        <div class="col-12">
            {{ Form::label('date', '日付', ['class' => 'form-label']) }}
            {{ Form::input('dateTime-local', 'date', isset($slot_project) ? $slot_project->date : '', ['class' => 'form-control']) }}
        </div>

        <div class="col-12">
            {{ Form::label('customer_id', '顧客', ['class' => 'form-label']) }}
            {{ Form::select('customer_id', $slot_customers, old('customer_id', isset($slot_project) ? $slot_project->customer_id : false), ['class' => 'form-select', 'placeholder' => '未指定']) }}
        </div>

        <div class="col-12 js-item">
            {{ Form::label('customer_manager', '顧客担当者', ['class' => 'form-label']) }}
            {{ Form::text('customer_manager', isset($slot_project) ? $slot_project->customer_manager : null, [
                'class' => 'form-control' . ($errors->has('customer_manager') ? ' is-invalid' : false),
                'placeholder' => '顧客担当者を入力してください',
            ]) }}
        </div>

        <div class="col-12">
            {{ Form::label('cost', '仕入れ額', ['class' => 'form-label']) }}
            {{ Form::number('cost', isset($slot_project) ? $slot_project->cost : null, ['class' => 'form-control', 'min' => 0,'max' => 100000000,]) }}
        </div>

        <div class="col-12">
            {{ Form::label('gross_profit', '粗利', ['class' => 'form-label']) }}
            {{ Form::number('gross_profit', isset($slot_project) ? $slot_project->gross_profit : null, ['class' => 'form-control', 'min' => 0,'max' => 100000000,]) }}
        </div>

        <div class="col-12">
            {{ Form::label('description', '説明', ['class' => 'form-label']) }}
            {{ Form::textarea('description', old('description', isset($slot_project) ? $slot_project->description : null), ['class' => 'form-control']) }}
        </div>

        <div class="col-12 mt-0">
            <hr class="my-4">
            {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md']) }}
        </div>
    </div>
    {!! Form::close() !!}
@endsection
