@component('admin.user.components.form', [
    'slot_route' => 'admin.user.store',
    'slot_method' => 'post',
    'slot_groups' => $groups,
])
@endcomponent