@component('admin.group.components.form', [
    'slot_route' => ['admin.group.update', $group->id],
    'slot_method' => 'put',
    'slot_group' => $group,
])

@endcomponent