@component('user.project.components.form',
 [
    'slot_route' => 'user.project.store',
    'slot_customers' => $customers,
    'all_projects' => $all_projects,
    'slot_method' => 'post'
])
@endcomponent