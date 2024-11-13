@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' focus:outline-none rounded-md shadow-sm']) !!}>

{{-- border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 --}}
