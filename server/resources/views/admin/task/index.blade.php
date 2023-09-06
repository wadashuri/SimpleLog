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
                        <td class="align-middle">{{ $task->start->format("m月d日:H時i分/") }}{{ $task->end->format("m月d日:H時i分") }}</td>
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
        {{-- カレンダー --}}
        <div id='top'>

            Locales:
            <select id='locale-selector'></select>
        
          </div>
        <div id='calendar' data-tasks='@json($tasks)'></div>
        {{-- <task-calendar-common :events='@json($tasks)'></task-calendar-common> --}}
    </div>

    {{-- paginator --}}
    {{ $tasks->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}

    <script>

        document.addEventListener('DOMContentLoaded', function() {
          var initialLocaleCode = 'ja';
          var localeSelectorEl = document.getElementById('locale-selector');
          var calendarEl = document.getElementById('calendar');
          const jason_tasks = JSON.parse(calendarEl.dataset.tasks); // オブジェクトを取得
      
          var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
            header: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
            },
            defaultDate: new Date(),
            locale: initialLocaleCode,
            buttonIcons: false, // show the prev/next text
            weekNumbers: true,
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            defaultView: 'timeGridDay', // 初期表示を日単位に設定
            events: jason_tasks.data
            // [
            //   {
            //     title: 'All Day Event',
            //     start: '2019-08-01'
            //   },
            //   {
            //     title: 'Long Event',
            //     start: '2019-08-07',
            //     end: '2019-08-10'
            //   },
            //   {
            //     groupId: 999,
            //     title: 'Repeating Event',
            //     start: '2019-08-09T16:00:00'
            //   },
            //   {
            //     groupId: 999,
            //     title: 'Repeating Event',
            //     start: '2019-08-16T16:00:00'
            //   },
            //   {
            //     title: 'Conference',
            //     start: '2019-08-11',
            //     end: '2019-08-13'
            //   },
            //   {
            //     title: 'Meeting',
            //     start: '2019-08-12T10:30:00',
            //     end: '2019-08-12T12:30:00'
            //   },
            //   {
            //     title: 'Lunch',
            //     start: '2019-08-12T12:00:00'
            //   },
            //   {
            //     title: 'Meeting',
            //     start: '2019-08-12T14:30:00'
            //   },
            //   {
            //     title: 'Happy Hour',
            //     start: '2019-08-12T17:30:00'
            //   },
            //   {
            //     title: 'Dinner',
            //     start: '2019-08-12T20:00:00'
            //   },
            //   {
            //     title: 'Birthday Party',
            //     start: '2019-08-13T07:00:00'
            //   },
            //   {
            //     title: 'Click for Google',
            //     url: 'http://google.com/',
            //     start: '2019-08-28'
            //   }
            // ]
          });
      
          calendar.render();
      
          // build the locale selector's options
          calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
            var optionEl = document.createElement('option');
            optionEl.value = localeCode;
            optionEl.selected = localeCode == initialLocaleCode;
            optionEl.innerText = localeCode;
            localeSelectorEl.appendChild(optionEl);
          });
      
          // when the selected option changes, dynamically change the calendar option
          localeSelectorEl.addEventListener('change', function() {
            if (this.value) {
              calendar.setOption('locale', this.value);
            }
          });
      
        });
      
      </script>
@endsection
