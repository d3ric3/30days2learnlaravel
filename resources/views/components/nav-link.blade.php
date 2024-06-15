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

<!-- Sample for rendering anchor or button based on 'type' prop
@props(['active' => false, type => 'a'])

<php if($type == 'a') : ?>
    <a class"{{ $active ? 'active-style' : 'inactive-style' }} {{ $attributes }}>{{ $slot }}</a>
<php else : ?>
    <button class"{{ $active ? 'active-style' : 'inactive-style' }} {{ $attributes }}>{{ $slot }}</button>
<php endif ?>

############## Usage: layout.blade.php ##############
<x-nav-link :active='false' type='button'>This is a button</x-nav-link>
<x-nav-link :active='false' type='a'>This is an anchor</x-nav-link>
-->
