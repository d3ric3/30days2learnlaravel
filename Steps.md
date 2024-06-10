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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
```php
  // home.blade.php
  <x-layout>
    <h1>Hello from Home Page.</h1>
  </x-layout>
```
```php
  // about.blade.php
  <x-layout>
    <h1>Hello from About Page.</h1>
  </x-layout>
```
```php
  // contact.blade.php
  <x-layout>
    <h1>Hello from Contact Page.</h1>
  </x-layout>
```
