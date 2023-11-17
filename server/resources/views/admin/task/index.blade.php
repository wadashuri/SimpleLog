@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- search --}}
    @include('parts.task.search', [
        'slot_route' => ['admin.task.index'],
        'slot_method' => 'GET',
    ])

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">タスク一覧</h1>
        <div class="btn-toolbar mb-2 mb-md-0 align-items-end">
            <div class="btn-group me-2">
                <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('admin.task.create') }}">
                    <span data-feather="plus-circle"></span>
                    新規登録
                </a>
            </div>
            <div class="btn-group me-2">
                {!! Form::open(['route' => 'admin.task.export', 'method' => 'post']) !!}
                <button type="submit" class="btn btn-sm btn-outline-success">TXTエクスポート</button>
                <input type="hidden" name="date" value={{ request()->input('date', date('Y-m-d')) }}>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- カレンダー --}}
    <div id='top'>
        Locales:
        <select id='locale-selector'></select>
    </div>
    <div id='calendar' data-tasks='@json($tasks)'></div>

    {{-- table --}}
    <div class="table-responsive">
        <table class="table text-nowrap table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">名前</th>
                    <th scope="col">開始/終了</th>
                    <th scope="col">状態</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr>
                        <td class="align-middle">{{ $task->title }}</td>
                        <td class="align-middle">
                            {{ $task->start->format('m月d日:H時i分/') }}{{ $task->end->format('m月d日:H時i分') }}</td>
                        <td class="align-middle">
                            <span class="{{ StatusConstants::COLOR[$task->status] }}">
                                {{ StatusConstants::STATUS[$task->status] }}
                            </span>
                        </td>
                        <td class="align-middle">
                            <div class="btn-group me-2">
                                <a class="btn btn-sm btn-outline-success" href="{{ route('admin.task.show', $task->id) }}">
                                    <span data-feather="info"></span>
                                    詳細
                                </a>
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.task.edit', $task->id) }}">
                                    <span data-feather="edit"></span>
                                    編集
                                </a>
                                {!! Form::open([
                                    'route' => ['admin.task.destroy', $task->id],
                                    'method' => 'delete',
                                    'class' => 'btn-group',
                                ]) !!}
                                {!! Form::button('<span data-feather="trash"></span>削除', [
                                    'type' => 'submit',
                                    'class' => 'btn btn-sm btn-outline-danger',
                                    'onclick' => "if(!confirm('削除をしてもよろしいですか？')) return false;",
                                ]) !!}
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                @empty
                    <p>タスクが登録されていません</p>
                @endforelse
            </tbody>
        </table>

        {{-- modal --}}
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">タスク</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @component('admin.task.components.form', [
                            'slot_route' => 'admin.task.store',
                            'slot_method' => 'post',
                            'projects' => $projects,
                        ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- paginator --}}
    {{ $tasks->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}

    <script>
        // カレンダー
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
            const jason_tasks = JSON.parse(calendarEl.dataset.tasks); // オブジェクトを取得

            const calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                defaultDate: new Date(),
                defaultView: 'timeGridDay', // 初期表示を日単位に設定
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                select: function(arg) {
                    const title = prompt('タスク名');
                    const dateStart = new Date(arg.start);
                    const dateEnd = new Date(arg.end);

                    const isoFormattedStart = toISODateTimeLocalString(dateStart);
                    const isoFormattedEnd = toISODateTimeLocalString(dateEnd);

                    if (title) {
                        calendar.addEvent({
                            title: title,
                            start: arg.start,
                            end: arg.end,
                            allDay: arg.allDay
                        })

                        // POSTするデータ
                        const postDataObject = {
                            title: title,
                            status: 0,
                            start: isoFormattedStart,
                            end: isoFormattedEnd,
                        };

                        const apiUrl = '{{ route('admin.task.store') }}';

                        // 非同期関数を呼び出してPOSTリクエストを行います。
                        postData(apiUrl, postDataObject);
                    } else {
                        alert('タスク名を入力してください');
                    }
                    calendar.unselect()
                },
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: jason_tasks.data,
                eventClick: (e) => { // イベントのクリックイベント
                    // モーダルを表示
                    const dateStart = new Date(e.event.start);
                    const dateEnd = new Date(e.event.end);

                    const isoFormattedStart = toISODateTimeLocalString(dateStart);
                    const isoFormattedEnd = toISODateTimeLocalString(dateEnd);

                    // inputフィールドの値を設定
                    document.getElementById('project_id').value = e.event.extendedProps.project_id;
                    document.getElementById('title').value = e.event.title;
                    document.getElementById('start').value = isoFormattedStart;
                    document.getElementById('end').value = isoFormattedEnd;
                    document.getElementById('status').value = e.event.extendedProps.status;

                    const modal = new bootstrap.Modal(exampleModal);
                    modal.show();

                    const putForm = document.getElementById('putForm');
                    putForm.addEventListener('click', function() {
                        e.event.remove();
                        const title = document.getElementById('title').value;
                        if (title) {
                            calendar.addEvent({
                                title: document.getElementById('title').value,
                                start: document.getElementById('start').value,
                                end: document.getElementById('end').value,
                                allDay: e.allDay
                            })

                            // PUTするデータ
                            const putDataObject = {
                                project_id: document.getElementById('project_id').value,
                                title: document.getElementById('title').value,
                                start: document.getElementById('start').value,
                                end: document.getElementById('end').value,
                                status: document.getElementById('status').value
                            };

                            var numericId = parseInt(e.event.id, 10);
                            const apiUrl = '{{ route('admin.task.update', '*') }}'.replace('*',
                                numericId);

                            // 非同期関数を呼び出してPOSTリクエストを行います。
                            putData(apiUrl, putDataObject);
                        } else {
                            alert('タスク名を入力してください');
                        }
                    });

                    const deleteTask = document.getElementById('delete');
                    deleteTask.addEventListener('click', function() {
                        if (confirm('削除をしてもよろしいですか？')) {
                            var numericId = parseInt(e.event.id, 10);
                            const apiUrl = '{{ route('admin.task.destroy', '*') }}'.replace(
                                '*', numericId);
                            // 非同期関数を呼び出してDELETEリクエストを行います。
                            deleteData(apiUrl);
                            e.event.remove();
                        } else {
                            return false;
                        }
                    });
                }
            });

            calendar.render();
        });

        // 与えられた日時をISO 8601 形式の日本時間に変換
        const toISODateTimeLocalString = (date) => {
            const year = date.getFullYear();
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const day = date.getDate().toString().padStart(2, '0');
            const hours = date.getHours().toString().padStart(2, '0');
            const minutes = date.getMinutes().toString().padStart(2, '0');
            return `${year}-${month}-${day}T${hours}:${minutes}`;
        };

        //非同期処理
        //post
        const postData = async (url, data) => {
            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify(data),
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                console.log('通信成功!');
            } catch (error) {
                console.error('Error during POST request:', error);
            }
        };

        //put
        const putData = async (url, data) => {
            try {
                const response = await fetch(url, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify(data),
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                console.log('通信成功!');
            } catch (error) {
                console.error('Error during PUT request:', error);
            }
        };

        // delete
        const deleteData = async (url) => {
            try {
                const response = await fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                });

                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                console.log('通信成功!');
            } catch (error) {
                console.error('Error during DELETE request:', error.message);
            }
        };
    </script>
    <style>
        body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
    </style>
@endsection
