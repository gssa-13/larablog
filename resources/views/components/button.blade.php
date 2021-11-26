<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-block']) }}>
    {{ $slot }}
</button>
