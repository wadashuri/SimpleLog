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
                    <th class="table-light text-nowrap col-lg-3">
                        名前
                    </th>
                    <td>
                        {{ $admin->name }}
                    </td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">adminログインURL</th>
                    <td>
                        <a href="{{ route('admin.login_form') }}">
                            {{ route('admin.login_form') }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <th class="table-light text-nowrap col-lg-3">userログインURL</th>
                    <td>
                        <a href="{{ route('user.login_form') }}">
                            {{ route('user.login_form') }}
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
