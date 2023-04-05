@component('admin.project.components.form',
[
    'slot_route' => ['admin.project.update', $project->id],
    'slot_method' => 'put',
    'slot_project' => $project,
    'slot_customers' => $customers,
])
@endcomponent