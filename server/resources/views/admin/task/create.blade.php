@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">タスク</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.task.index') }}">
                <span data-feather="corner-down-left" class="svg_initial"></span>
                戻る
            </a>
        </div>
    </div>
    @component('admin.task.components.form', [
        'slot_route' => 'admin.task.store',
        'slot_method' => 'post',
        'projects' => $projects,
    ])
    @endcomponent
@endsection
