{{-- 色付きラベル --}}
<div {{ $attributes->merge([
        'class' => 'border border-3 rounded-3 text-center',
        'style' => '',
    ])}}>
    <h1 class="custom-item-font-color my-3">{{ $slot }}</h1>
</div>
