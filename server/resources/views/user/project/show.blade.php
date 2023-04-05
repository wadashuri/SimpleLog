@extends('layouts.user.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">プロジェクト詳細</h1>
        <div class="btn-group mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('user.project.index') }}">
                <span data-feather="corner-down-left"></span>
                戻る
            </a>
            <a class="btn btn-sm btn-outline-primary" href="{{ route('user.project.edit', $project->id) }}">
                <span data-feather="edit"></span>
                編集
            </a>
            {!! Form::open(['route' => ['user.project.destroy', $project->id], 'method' => 'delete', 'class' => 'btn-group']) !!}
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
                    <th class="table-light text-nowrap col-lg-3">顧客名</th>
                    <td>{{ $project->customer->name ??'' }}</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">顧客担当者</th>
                    <td>{{ $project->customer_manager }}</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">仕入れ額</th>
                    <td>{{ $project->cost }}円</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">備考</th>
                    <td>{!! nl2br(e($project->description)) !!}</td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">日付</th>
                    <td>{{ $project->date }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
