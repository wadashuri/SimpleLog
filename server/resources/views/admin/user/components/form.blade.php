@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ユーザー</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.user.index') }}">
                <span data-feather="corner-down-left" class="svg_initial"></span>
                戻る
            </a>
        </div>
    </div>

    {!! Form::open(['route' => $slot_route, 'method' => $slot_method, 'files' => 'true']) !!}
    <div class="row g-3 mb-3">


        <div class="col-12">
                <label>グループ</label>
                <div class="accordion mt-3" id="accordionUserGroup">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUserGroup" aria-expanded="false" aria-controls="collapseUserGroup">
                                グループ
                            </button>
                        </h2>
                        <div id="collapseUserGroup" class="accordion-collapse collapse" aria-labelledby="headingUserGroup" data-bs-parent="#accordionUserGroup">
                            <div class="accordion-body">
                                <div class="js-group_box">
                                    @foreach($slot_groups as $group)
                                        <label class="col-3 mb-2">
                                            {{ Form::checkbox('groups[]', $group->id,
                                                in_array($group->id, old('groups', isset($slot_user) ? $slot_user->groups->pluck('id')->toArray() : []), true),
                                                ['class' => 'form-check-input'])
                                            }}
                                            {{ $group->name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="col-12">
            <label>名前</label>
            {{ Form::text('name', old('name', isset($slot_user) ? $slot_user->name : null), ['class' => 'form-control', 'required']) }}
        </div>

        <div class="mb-3">
            {{ Form::label('administrator', '権限', ['class' => 'form-label']) }}
            {{ Form::select('administrator', UserConstants::TYPE, isset($slot_user) ? $slot_user->administrator : 1, ['disabled ' => !auth()->user()->can('pro'),'class' => 'form-select']) }}
        </div>

        <div class="col-12">
            <label>メールアドレス<span class="text-danger">*</span></label>
            {{ Form::email('email', old('email', isset($slot_user) ? $slot_user->email : null), ['class' => 'form-control', 'required']) }}
        </div>

        <div class="col-12">
            <label>パスワード<span class="text-danger">*</span></label>
            {{ Form::password('password', [
                'id' => 'password',
                'class' => 'form-control',
                'placeholder' => '入力してください',
            ]) }}
        </div>

        <hr class="my-4">
        @can('plan')
            {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md']) }}
        @else
            @if (isset($slot_user))
                {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md']) }}
            @else
                {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md', 'disabled' => true]) }}
                <small class="text-danger">※このプランではこれ以上ユーザー追加出来ません</small>
            @endif
        @endcan
    </div>
    </div>

    {!! Form::close() !!}

@endsection
