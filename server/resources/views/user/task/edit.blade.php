@component('user.task.components.form', [
    'slot_route' => ['user.task.update', $task->id],
    'slot_method' => 'put',
    'slot_task' => $task,
    'projects' => $projects
])
@endcomponent