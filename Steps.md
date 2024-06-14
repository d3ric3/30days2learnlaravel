# 30 Days To Learn Laravel

### Steps on following the learning series

## EP01

1. cd to Herd path

```bash
cd ~/Herd
laravel new example
No starter kit
Pest
No
SQLite
cd example
```

2. open browse and navigate to "example.test"

## EP02

1. open web.php and add

```php
Route::get('/about', function(){
  // return 'About page';
  // return ['foo' => 'bar'];
  return view('about');
});
```

2. create about.php under view folder with content "This is the about page".

## EP03

1. Create contact route in web.php

```php
Route::get('/contact', function(){
  return view('contact');
});
```

2. Rename **Welcome** to **Home** for both route and view file.

3. Now **Home** page should have html 5 markup with H1 tag inside the body tag with the content of "Hello from **Home** page".

4. Repeat step 3. for About page and Contact page.

5. Add nav tag into Home page.

```html
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home page</title>
  </head>
  <body>
    <nav>
      <a href="/">Home</a>
      <a href="/about">About</a>
      <a href="/contact">Contact</a>
    </nav>

    <h1>Hello from Home Page.</h1>
  </body>
</html>
```

6. Create layout.blade.php

```bash
touch app\resources\views\components\layout.blade.php
```

7. Copy the content of home.blade.php to layout.blade.php

8. Edit layout.blade.php and replace content of H1 with {{ $slot }}

```html
<body>
  <nav>
    <a href="/">Home</a>
    <a href="/about">About</a>
    <a href="/contact">Contact</a>
  </nav>

  {{ $slot }}
</body>
```

9. Edit all blade file

```html
// home.blade.php
<x-layout>
  <h1>Hello from Home Page.</h1>
</x-layout>
```

```html
// about.blade.php
<x-layout>
  <h1>Hello from About Page.</h1>
</x-layout>
```

```html
// contact.blade.php
<x-layout>
  <h1>Hello from Contact Page.</h1>
</x-layout>
```

## EP04

1. create nav-link.blade.php

```bash
touch app\resources\views\components\nav-link.blade.php
```

2. Edit nav-link.blade.php

```html
<a {{ $attributes }}>{{ $slot }}</a>
```

2. Edit layout.blade.php

```html
<body>
  <nav>
    <x-nav-link href="/">Home</x-nav-link>
    <x-nav-link href="/about">About</x-nav-link>
    <x-nav-link href="/contact">Contact</x-nav-link>
  </nav>

  {{ $slot }}
</body>
```

3. Go to https://tailwindui.com/components/application-ui/application-shells/stacked

4. Hit the copy icon next to `HTML ˅`

5. Select all the content of body tag in the layout.blade.php and hit ctrl+v

6. Add tailwindcss script within the head tag

```html

  <script src="https://cdn.tailwindcss.com"></script>
</head>
```

7.  Remove the whole dropdown that contains `"My Profile"` for both desktop and mobile screen

8.  Edit the original nav links in the tailwindcss theme to `Home`, `About` and `Contact` in both dekstop and mobile view

9.  Edit main tag to include `$slot`

```html
<main>
  <div class="long tailwindcss style here">{{ $slot }}</div>
</main>
```

10. Replace the `Dashboard` text in the H1 tag to `{{ $heading }}`

```html
<header>
  <div>
    <h1>{{ $heading }}</h1>
  </div>
</header>
```

11. Add heading slot to all blade file

```html
<!-- home.blade.php -->
<x-layout>
  <x-slot:heading> Home Page </x-slot:heading>
  <h1>Hello from The Home Page.</h1>
</x-layout>

<!-- Repeat for about.blade.php -->
<!-- Repeat for contact.blade.php -->
```

12. Optionally you replace the profile image and the email for both desktop and mobile view

## EP05

1. Edit class property of html tag for layout.blade.php

```html
<html lang="en" class="h-full bg-gray-100"></html>
```

2. Edit class property of body tag for layout.blade.php

```html
<body class="h-full"></body>
```

3. Edit navigation link to conditionally display active and inactive styling

```php
<div class="hidden md:block">
  <a href="/" class="{{ request()->is('/') ? 'active-styling' : 'inactive-styling'" }}>
  <a href="/about" class="{{ request()->is('about') ? 'active-styling' : 'inactive-styling'" }}>
  <a href="/contact" class="{{ request()->is('contact') ? 'active-styling' : 'inactive-styling'" }}>
</div>
```

4. Create app\resources\views\components\nav-link.blade.php

5. Edit nav-link.blade.php

```php
// attributes vs props
// attributes are html attributes, props are not html attributes
// after 'active' is declare as props, $attributes will not contains 'active'
// 'active' props is default to false
@props(['active' => false ])

// after declare 'active' props we can replace request->is('/') to $active
<a class="{{ $active ? 'active style' : 'inactive style' }}"
aria-current="{{ $active ? 'page' : 'false' }}"
{{ $attributes }}
>
{{ $slot }}
</a>
```

6. Edit layout.blade.php

```php
// colon before an attribute will let compiler treat the content of that attribute as php code

<div class="hidden md:block">
  <x-nav-link href="/" :active="request()->is('/') ? true : false" }}>Home</x-nav-link>
  <x-nav-link href="/about" :active="request()->is('/about') ? true : false" }}>About</x-nav-link>
  <x-nav-link href="/contact" :active="request()->is('/contact') ? true : false" }}>Contact</x-nav-link>
</div>
```
