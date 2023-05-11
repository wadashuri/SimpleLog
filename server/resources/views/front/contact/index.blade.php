@component('front.components.contact', [
    'slot_route' => 'front.contact.confirm',
])
    @slot('slot_content_select')
        {{ Form::select('content_select', \ContactConstants::CONTENT_SELECT, old('content_select'), ['required', 'placeholder' => '選択してください', 'class' => 'form-control']) }}
    @endslot

    {{-- お名前 --}}
    @slot('slot_name')
        <div class="last_name">{{ Form::text('last_name', old('last_name'), ['class' => 'form-control','placeholder' => '姓', 'required']) }}</div>
        <div class="first_name">{{ Form::text('first_name', old('first_name'), ['class' => 'form-control','placeholder' => '名', 'required']) }}</div>
    @endslot

    {{-- フリガナ --}}
    @slot('slot_ruby')
        <div class="last_name_kana">{{ Form::text('last_name_ruby', old('last_name_ruby'), ['class' => 'form-control','placeholder' => 'セイ', 'required']) }}</div>
        <div class="first_name_kana">{{ Form::text('first_name_ruby', old('first_name_ruby'), ['class' => 'form-control','placeholder' => 'メイ', 'required']) }}</div>
    @endslot

    {{-- メールアドレス --}}
    @slot('slot_email')
        {{ Form::email('email', old('email'), ['class' => 'form-control','placeholder' => '○○○○○○@email.com', 'required']) }}
    @endslot

    {{-- お問い合わせ内容 --}}
    @slot('slot_content')
        {{ Form::textarea('content', old('content'), ['class' => 'form-control','placeholder' => 'お問い合せ内容はこちらに記入してください。', 'rows' => '5', 'required']) }}
    @endslot

    {{-- ボタン --}}
    @slot('slot_button')
        {{-- <div class="contact_form--btn">
            {{ Form::button('確認画面へ', ['class' => 'form-control','type' => 'submit']) }}
        </div> --}}
        <div class="contact_form--btn">
            {{ Form::button('現在お問い合わせは停止しています', ['class' => 'form-control','type' => 'submit','disabled' => true]) }}
        </div>
    @endslot
@endcomponent