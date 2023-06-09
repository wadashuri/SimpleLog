@extends('layouts.master.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('master.admin.index') }}">
                <span data-feather="corner-down-left" class="svg_initial"></span>
                戻る
            </a>
        </div>
    </div>

    {!! Form::open(['route' => $slot_route, 'method' => $slot_method, 'files' => 'true']) !!}
    <div class="row g-3 mb-3">
        <div class="col-12">
            <label>会社名</label>
            {{ Form::text('name', old('name', isset($slot_admin) ? $slot_admin->name : null), ['class' => 'form-control', 'required']) }}
        </div>

        <div class="col-12">
            <label>メールアドレス<span class="text-danger">*</span></label>
            {{ Form::email('email', old('email', isset($slot_admin) ? $slot_admin->email : null), ['class' => 'form-control', 'required']) }}
        </div>

        <div class="col-12">
            <label>パスワード<span class="text-danger">*</span></label>
            {{ Form::password('password', [
                'id' => 'password',
                'class' => 'form-control',
                'placeholder' => '入力してください',
            ]) }}
        </div>

        <div class="col-12 mt-0">
            <hr class="my-4">
            {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md']) }}
        </div>
    </div>

    {!! Form::close() !!}

@endsection
