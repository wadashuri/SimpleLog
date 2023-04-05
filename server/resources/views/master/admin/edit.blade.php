@component('master.admin.components.form', [
    'slot_route' => ['master.admin.update', $admin->id],
    'slot_method' => 'put',
    'slot_admin' => $admin
])
@endcomponent