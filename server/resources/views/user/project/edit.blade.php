@component('user.project.components.form',
[
    'slot_route' => ['user.project.update', $project->id],
    'slot_method' => 'put',
    'slot_project' => $project,
    'slot_customers' => $customers,
])
@endcomponent