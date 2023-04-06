@component('user.task.components.form', [
    'slot_route' => 'user.task.store',
    'slot_method' => 'post',
    'projects' => $projects
])
@endcomponent