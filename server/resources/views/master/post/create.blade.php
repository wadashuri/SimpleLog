@component('master.post.components.form', [
    'slot_route' => 'master.post.store',
    'slot_method' => 'post',
    'slot_categories' => $categories,
])
@endcomponent