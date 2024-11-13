<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full items-center transition delay-150 py-3 bg-purple-800  hover:bg-purple-900 border text-white border-transparent rounded-sm font-normal text-sm tracking-widest ']) }}>
    {{ $slot }}
</button>
