@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm bg-transparent border-gray-800 focus:border-indigo-300 focus:ring focus:ring-gray-900 focus:ring-opacity-50']) !!}>
