@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">プロジェクト詳細</h1>
        <div class="btn-group mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.project.index') }}">
                <span data-feather="corner-down-left"></span>
                戻る
            </a>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.project.edit', $item->id) }}">
                <span data-feather="edit"></span>
                編集
            </a>
            {!! Form::open(['route' => ['admin.project.destroy', $item->id], 'method' => 'delete', 'class' => 'btn-group']) !!}
            {!! Form::button('<span data-feather="trash"></span>削除', [
                'type' => 'submit',
                'class' => 'btn btn-sm btn-outline-danger',
                'onclick' => "if(!confirm('削除をしてもよろしいですか？')) return false;",
            ]) !!}
            {!! Form::close() !!}
        </div>
    </div>

    <div class="table-responsive col-lg-8 col-md-12">
        <table class="table table-bordered align-middle">
            <tbody>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">ユーザー名</th>
                    <td>{{ $item->user->account ??'' }}</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">部署名</th>
                    <td>{{ $item->department->name ??'' }}</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">顧客名</th>
                    <td>{{ $item->customer->name ??'' }}</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">顧客担当者</th>
                    <td>{{ $item->customer_manager }}</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">商品</th>
                    <td>{{ $item->product }}</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">価格</th>
                    <td>{{ $item->price }}円</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">数量</th>
                    <td>{{ $item->amount }}個</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">備考</th>
                    <td>{!! nl2br(e($item->note)) !!}</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">日付</th>
                    <td>{{ $item->date }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
