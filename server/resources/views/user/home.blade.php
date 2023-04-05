@extends('layouts.user.app')

@section('content')
    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">ホーム</h1>
    </div>

    <div class="table-responsive col-lg-8 col-md-12">
        <table class="table table-bordered align-middle">
            <tbody>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">氏名
                    </th>
                    <td>{{ $user->name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
