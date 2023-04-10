@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">顧客</h1>
    </div>

    {!! Form::open(['route' => 'admin.customer.store', request()->route('customer'), 'method' => 'POST']) !!}
    <div class="row g-3 mb-3">
        <div class="col-12">
            <label>顧客名</label>
            {{ Form::text('name', null, [
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => '顧客名を入力してください',
            ]) }}
        </div>

        <div class="col-12 mt-0">
            <hr class="my-4">
            {{ Form::button('送信', ['type' => 'submit', 'class' => 'w-100 btn btn-primary btn-md']) }}
        </div>
    </div>
    {!! Form::close() !!}

    <div class="btn-toolbar mb-2 mb-md-0 align-items-end">
        <div class="btn-group me-2">
            {!! Form::open(['route' => 'admin.customer.export', 'method' => 'post']) !!}
            <button type="submit" class="btn btn-sm btn-outline-success">CSVエクスポート</button>
            {!! Form::close() !!}
        </div>
        <div class="btn-group me-2">
            {!! Form::open(['route' => 'admin.customer.importCsv', 'method' => 'post', 'class' => 'mr-1', 'files' => true]) !!}
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input class="form-control" type="file" name="file" placeholder="ファイル選択">
                        <button class="btn btn-outline-success" type="submit" id="submit">インポート</button>
                    </div>
                    @error('file')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="table-responsive">
        <table class="table text-nowrap table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">顧客名</th>
                    <small class="text-danger">※顧客名はクリックで編集が出来ます</small>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td class="align-middle">{{ $customer->id }}</td>
                        <td class="align-middle">
                            <edit-text-common :value="{{ $customer }}" csrf-token="{{ csrf_token() }}" title="顧客"
                                route="{{ route('admin.customer.update', $customer->id) }}">
                            </edit-text-common>
                        </td>
                        <td class="align-middle col-5">
                            <div class="d-flex gap-2">
                                <span>
                                    {{ Form::open([
                                        'route' => ['admin.customer.destroy', [$customer->id]],
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
        {{ $customers->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
