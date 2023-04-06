@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">グループ</h1>
    </div>

    {!! Form::open(['route' => 'admin.group.store', request()->route('group'), 'method' => 'POST']) !!}
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
                            <edit-text-common
                            :value="{{ $group }}"
                            csrf-token="{{ csrf_token() }}"
                            title="グループ"
                            route="{{ route('admin.group.update', $group->id) }}"
                            ></edit-text-common>
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
        {{-- paginator --}}
        {{ $groups->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
