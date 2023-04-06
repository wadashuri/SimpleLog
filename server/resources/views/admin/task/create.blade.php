@component('admin.task.components.form', [
    'slot_route' => 'admin.task.store',
    'slot_method' => 'post',
    'projects' => $projects
])
@endcomponent