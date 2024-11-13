@props(['value'])

<label {{ $attributes->merge(['class' => ' focus:outline-none  ring:outline-none font-normal text-sm text-slate-100 ']) }}>
    {{ $value ?? $slot }}
</label>
