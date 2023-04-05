@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">グループ</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.group.index') }}">
                <span data-feather="corner-down-left"></span>
                戻る
            </a>
        </div>
    </div>

    {!! Form::open(['route' => $slot_route, 'method' => $slot_method]) !!}
        <div class="row g-3 mb-3">
            <div class="col-12">
                <label>グループ名</label>
                {{ Form::text('name', old('name', isset($slot_group) ? $slot_group->name : null), ['class' => 'form-control', 'required']) }}
            </div>

            <div class="col-12 mt-0">
                <hr class="my-4">
                {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md']) }}
            </div>
        </div>
    {!! Form::close() !!}
@endsection