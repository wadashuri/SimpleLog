@component('admin.project.components.form',
 [
    'slot_route' => 'admin.project.store',
    'slot_customers' => $customers,
    'all_projects' => $all_projects,
    'slot_method' => 'post'
])
@endcomponent