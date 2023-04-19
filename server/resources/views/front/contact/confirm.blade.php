@component('front.components.contact', [
    'slot_route' => 'front.contact.send',
])
    @slot('slot_content_select')
        {{ \ContactConstants::CONTENT_SELECT[$params['content_select']] }}
    @endslot

    {{-- お名前 --}}
    @slot('slot_name')
        {{ $params['last_name'] }}
        {{ $params['first_name'] }}
    @endslot

    {{-- フリガナ --}}
    @slot('slot_ruby')
        {{ $params['last_name_ruby'] }}
        {{ $params['first_name_ruby'] }}
    @endslot

    {{-- メールアドレス --}}
    @slot('slot_email')
        {{ $params['email'] }}
    @endslot

    {{-- お問い合わせ内容 --}}
    @slot('slot_content')
        {!! nl2br(e($params['content'])) !!}
    @endslot

    {{-- ボタン --}}
    @slot('slot_button')
        {{ Form::button('送信', ['type' => 'submit', 'name' => 'action', 'value' => 'send', 'class' => 'form-control']) }}
        {{ Form::button('戻る', ['type' => 'submit', 'name' => 'action', 'value' => 'back', 'class' => 'form-control']) }}
    @endslot

    {{-- hidden --}}
    @slot('slot_hidden')
        @foreach($params as $key => $value)
            {{ Form::hidden($key, $value) }}
        @endforeach
    @endslot
@endcomponent