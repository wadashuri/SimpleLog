@component('admin.task.components.form', [
    'slot_route' => ['admin.task.update', $task->id],
    'slot_method' => 'put',
    'slot_task' => $task,
    'projects' => $projects
])
@endcomponent