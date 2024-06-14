<!--
 attributes vs props
 attributes are html attributes, props are not html attributes
 after 'active' is declare as props, $attributes will not contains 'active'
 'active' props is default to false
-->

@props(['active' => false ])

<!-- after declare 'active' props we can replace request->is('/') to $active -->
<a class="{{ $active ? 'rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white' : '"rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white' }}"
aria-current="{{ $active ? 'page' : 'false' }}"
{{ $attributes }}
>
{{ $slot }}
</a>
