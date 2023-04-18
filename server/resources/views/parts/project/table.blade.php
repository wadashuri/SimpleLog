{{-- table --}}
    <div class="table-responsive">
        <table class="table text-nowrap table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">名前</th>
                    <th scope="col">顧客名</th>
                    <th scope="col">顧客担当者</th>
                    <th scope="col">計上日</th>
                    <th scope="col">進捗</th>
                    <th scope="col">コスト</th>
                    <th scope="col">人数</th>
                    <th scope="col">一人あたりの生産性</th>
                    <th scope="col">日付</th>
                    <th scope="col">操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td class="align-middle">{{ $project->id }}</td>
                        <td class="align-middle">{{ $project->name ?? '' }}</td>
                        <td class="align-middle">{{ $project->customer->name ?? '' }}</td>
                        <td class="align-middle">{{ $project->customer_manager ?? '' }}</td>
                        <td class="align-middle">{{ $project->date }}</td>
                        <td class="align-middle">{{ $project->progress }}%</td>
                        <td class="align-middle">&yen;{{ number_format($project->cost) }}</td>
                        <td class="align-middle">{{ number_format($project->totalUserCount()) }}</td>
                        <td class="align-middle">&yen;{{ number_format($project->productivity()) }}</td>
                        <td class="align-middle">{{ $project->date ?? '' }}</td>
                        <td class="align-middle">
                            <div class="btn-group me-2">
                                <a class="btn btn-sm btn-outline-success"
                                    href="{{ route('admin.project.show', $project->id) }}">
                                    <span data-feather="info"></span>
                                    詳細
                                </a>
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('admin.project.edit', $project->id) }}">
                                    <span data-feather="edit"></span>
                                    編集
                                </a>
                                {!! Form::open([
                                    'route' => ['admin.project.destroy', $project->id],
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
                @endforeach
            </tbody>
        </table>
    </div>