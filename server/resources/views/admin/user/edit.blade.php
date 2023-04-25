@component('admin.user.components.form', [
    'slot_route' => ['admin.user.update', $user->id],
    'slot_method' => 'put',
    'slot_user' => $user,
    'slot_groups' => $groups,
])
@endcomponent