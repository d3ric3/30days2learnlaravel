# 30 Days To Learn Laravel

### Steps on follwing the learning series

### EP01

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

### EP02

1. open web.php and add

```php
Route::get('/about', function(){
  // return 'About page';
  // return ['foo' => 'bar'];
  return view('about');
});
```

2. create about.php under view folder
