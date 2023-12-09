@extends('layouts.admin.app')

@section('content')
    {{-- alert --}}
    @include('parts.alert.bootstrap-5')

    {{-- header --}}
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">タスク一覧</h1>
        <div class="btn-toolbar mb-2 mb-md-0 align-items-end">
            <div class="btn-group me-2">
                {!! Form::open(['route' => 'admin.task.export', 'method' => 'post', 'class' => 'd-flex gap-1  flex-wrap align-items-center']) !!}
                {{-- 日付 --}}
                <div>
                    {{ Form::input('date', 'date', request()->input('date', date('Y-m-d')), ['class' => 'form-control']) }}
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-outline-success">TXTエクスポート</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    {{-- カレンダー --}}
    <div id='calendar' data-tasks='@json($tasks)'></div>

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
@endsection

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
            locale: 'ja',
            selectMirror: true,
            select: function(e) {
                const title = prompt('タスク名');

                if (title) {
                    const dateStart = new Date(e.start);
                    const dateEnd = new Date(e.end);

                    const isoFormattedStart = toISODateTimeLocalString(dateStart);
                    const isoFormattedEnd = toISODateTimeLocalString(dateEnd);

                    // POSTするデータ
                    const postDataObject = {
                        title: title,
                        status: 0,
                        start: isoFormattedStart,
                        end: isoFormattedEnd,
                    };

                    const apiUrl = '{{ route('admin.task.store') }}';

                    // 非同期関数を呼び出してPOSTリクエストを行います。
                    postData(apiUrl, postDataObject).then((resolvedData) => {
                            const eventData = {
                                id: resolvedData.id,
                                title: title,
                                start: e.start,
                                end: e.end,
                                allDay: e.allDay,
                                status: document.getElementById('status').value,
                                project_id: document.getElementById('project_id').value
                            };

                            calendar.addEvent(eventData);
                        })
                        .catch((error) => {
                            console.error('エラーが発生しました:', error);
                        });

                } else {
                    alert('タスク名を入力してください');
                }

                calendar.unselect();
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: jason_tasks.data,
            eventClick: (e) => {
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

                function putFormHandler() {
                    e.event.remove();
                    const title = document.getElementById('title').value;
                    if (title) {
                        calendar.addEvent({
                            id: e.event.id,
                            title: document.getElementById('title').value,
                            start: document.getElementById('start').value,
                            end: document.getElementById('end').value,
                            allDay: e.allDay,
                            status: document.getElementById('status').value,
                            project_id: document.getElementById('project_id').value,
                        });

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

                        // 非同期関数を呼び出してPUTリクエストを行います。
                        putData(apiUrl, putDataObject);

                        // Remove the event listener after it has been executed
                        putForm.removeEventListener('click', putFormHandler);
                    } else {
                        alert('タスク名を入力してください');
                    }
                }

                // Attach the event listener
                putForm.addEventListener('click', putFormHandler);

                const deleteTask = document.getElementById('delete');

                function deleteTaskHandler() {
                    if (confirm('削除をしてもよろしいですか？')) {
                        var numericId = parseInt(e.event.id, 10);
                        const apiUrl = '{{ route('admin.task.destroy', '*') }}'.replace('*',
                            numericId);

                        // 非同期関数を呼び出してDELETEリクエストを行います。
                        deleteData(apiUrl);
                        e.event.remove();

                        // Remove the event listener after it has been executed
                        deleteTask.removeEventListener('click', deleteTaskHandler);
                    } else {
                        return false;
                    }
                }

                // Attach the event listener
                deleteTask.addEventListener('click', deleteTaskHandler);
            },
            eventDrop: function(e) {
                // イベントがドロップされたときに実行する処理
                var droppedEvent = e.event;

                const dateStart = new Date(droppedEvent.start);
                const dateEnd = new Date(droppedEvent.end);

                const isoFormattedStart = toISODateTimeLocalString(dateStart);
                const isoFormattedEnd = toISODateTimeLocalString(dateEnd);

                // PUTするデータ
                const putDataObject = {
                    project_id: droppedEvent.extendedProps.project_id,
                    title: droppedEvent.title,
                    start: isoFormattedStart,
                    end: isoFormattedEnd,
                    status: droppedEvent.extendedProps.status
                };

                var numericId = parseInt(e.event.id, 10);
                const apiUrl = '{{ route('admin.task.update', '*') }}'.replace('*',
                    numericId);

                // 非同期関数を呼び出してPUTリクエストを行います。
                putData(apiUrl, putDataObject);
            },
            eventResize: function(e) {
                // イベントのリサイズが発生したときに実行する処理
                var resizedEvent = e.event;
                const dateStart = new Date(resizedEvent.start);
                const dateEnd = new Date(resizedEvent.end);

                const isoFormattedStart = toISODateTimeLocalString(dateStart);
                const isoFormattedEnd = toISODateTimeLocalString(dateEnd);

                // PUTするデータ
                const putDataObject = {
                    project_id: resizedEvent.extendedProps.project_id,
                    title: resizedEvent.title,
                    start: isoFormattedStart,
                    end: isoFormattedEnd,
                    status: resizedEvent.extendedProps.status
                };

                var numericId = parseInt(e.event.id, 10);
                const apiUrl = '{{ route('admin.task.update', '*') }}'.replace('*',
                    numericId);

                // 非同期関数を呼び出してPUTリクエストを行います。
                putData(apiUrl, putDataObject);
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

    // 非同期処理
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
            return response.json();
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
