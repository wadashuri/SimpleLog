@component('master.post.components.form', [
    'slot_route' => ['master.post.update', $post->id],
    'slot_method' => 'put',
    'slot_post' => $post,
    'slot_categories' => $categories,
])
@endcomponent