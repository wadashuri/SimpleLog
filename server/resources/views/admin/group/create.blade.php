@extends('layouts.admin.app')

@section('content')
    {{-- if alert--}}
    @if (session('alert'))
        <div class="alert alert-{{session('alert.type')}} alert-dismissible fade show mt-3 mb-0" role="alert" id="liveAlert">
            <div>{!! nl2br(e(session('alert.message'))) !!}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- if any validation error --}}
    @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show mt-3 mb-0" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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

    {!! Form::open(['route' => 'admin.group.store',request()->route('group'), 'method' => 'POST']) !!}
        <div class="row g-3 mb-3">
            <div class="col-12">
                <label>グループ名</label>
                {{ Form::text('name', null, [
                    'id' => 'name',
                    'class' => 'form-control',
                    'placeholder' => 'グループ名を入力してください',
                ]) }}
            </div>

            <div class="col-12 mt-0">
                <hr class="my-4">
                {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md']) }}
            </div>
        </div>

    {!! Form::close() !!}

    @if (isset($groups))

    <div class="table-responsive">
        <table class="table text-nowrap table-hover">
        <thead>
            <tr>
                <th scope="col">グループ名</th>
                <small class="text-danger">※グループ名はクリックで編集が出来ます</small>
                <th scope="col">操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group)
                <tr>
                    <td class="align-middle col-7">
                        {{ Form::open(['route' => ['admin.group.update', [$group->id]],
                            'method' => 'PUT',
                            'class' => 'js-editGroup group_form'
                        ]) }}

                        {{ Form::text('name', $group->name, [
                            'class' => 'form-control group_border_none',
                            'placeholder' => 'グループ名を入力してください',
                        ]) }}

                        {{ Form::close() }}
                    </td>
                        <td class="align-middle col-5">
                            <div class="d-flex gap-2">
                                <span>
                                    {{ Form::open([
                                        'route' => ['admin.group.destroy', [$group->id]],
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
    </div>
    @endif
@endsection