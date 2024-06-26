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

```html
<div class="hidden md:block">
  <a href="/" class="{{ request()->is('/') ? 'active-styling' : 'inactive-styling'}}">
  <a href="/about" class="{{ request()->is('about') ? 'active-styling' : 'inactive-styling'}}">
  <a href="/contact" class="{{ request()->is('contact') ? 'active-styling' : 'inactive-styling'}}">
</div>
```

4. Create app\resources\views\components\nav-link.blade.php

5. Edit nav-link.blade.php

```html
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
```

6. Edit layout.blade.php

```html
<!-- colon before an attribute will let compiler treat the content of that attribute as php code -->

<div class="hidden md:block">
    <x-nav-link href="/" :active="request()->is('/') ? true : false">
        Home
    </x-nav-link>
    <x-nav-link href="/about" :active="request()->is('/about') ? true : false">
        About
    </x-nav-link>
    <x-nav-link
        href="/contact"
        :active="request()->is('/contact') ? true : false"
    >
        Contact
    </x-nav-link>
</div>
```

## EP06

1. Sample blade file with php code (home work)

```html
<!-- File: nav-link.blade.php -->
<!-- Sample for rendering anchor or button based on 'type' prop -->
@props(['active' => false, type => 'a'])

<php if($type == 'a') : ?>
    <a class"{{ $active ? 'active-style' : 'inactive-style' }} {{ $attributes }}>{{ $slot }}</a>
<php else : ?>
    <button class"{{ $active ? 'active-style' : 'inactive-style' }} {{ $attributes }}>{{ $slot }}</button>
<php endif ?>
```

```html
<!-- File: layout.blade.php (usage of nav-link.blade.php) -->
<x-nav-link :active="false" type="button">This is a button</x-nav-link>
<x-nav-link :active="false" type="a">This is an anchor</x-nav-link>
```

2. Sample blade file with blade directive (home work)

```html
<!-- File: nav-link.blade.php -->
<!-- Sample for rendering anchor or button based on 'type' prop -->
@props(['active' => false, type => 'a'])

@if($type == 'a')
    <a class"{{ $active ? 'active-style' : 'inactive-style' }} {{ $attributes }}>{{ $slot }}</a>
@else
    <button class"{{ $active ? 'active-style' : 'inactive-style' }} {{ $attributes }}>{{ $slot }}</button>
@endif
```

3. Pass `jobs` variable to `about` page and rename
    - `about page` to `jobs page`
    - `about route` to `jobs route`

```php
// web.php
Route::get('/jobs', function() {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ]
    ]);
});
```

```html
<!-- jobs.blade.php -->
<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>

    <ul>
        @foreach($jobs as $job)
        <li>
            <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per
            year.
        </li>
        @endforeach
    </ul>
</x-layout>
```

4. Update `About` nav menu at layout.blade.php to `Jobs` nav menu

```html
<x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
```

5. Add `job` route to `web.php`

```php
// web.php
Route::get('/job/{id}', function($id) {
    $jobs = [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ];

/*
    // alternative solution
    \Illuminate\Support\Arr::first($jobs, function ($job) use ($id) {
        return $job['id'] == $id;
    });
*/

    $job = \Illuminate\Support\Arr::first($jobs, fn($job) => $job['id'] == $id);

    return view('job', ['job' => $job]);
});
```

6. Create new `job.blade.php`

```html
<x-layout>
    <x-slot:heading>Job</x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title] }}</h2>
    <p>This job pays {{ $job['salary'] }} per year.</p>
</x-layout>
```

7. Edit `jobs.blade.php` to link to `job.blade.php`

```html
<!-- jobs.blade.php -->
<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>

    <ul>
        @foreach($jobs as $job)
        <li>
            <a
                href="/jobs/{{ $job['id'] }}"
                class="text-blue-500 hover:underline"
            >
                <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }}
                per year.
            </a>
        </li>
        @endforeach
    </ul>
</x-layout>
```

## EP07

1. Edit get jobs route and get job route within `web.php`

```php
  use App\Models\Job;

  Route::get('/jobs', function() {
    return view('jobs', [
      'jobs' => Job::all()
    ]);
  });

  Route::get('/job/{id}', function($id) {
    $job = Job::find($id);

    return view('job', ['job' => $job]);
  });
```

2. Create `App\Models\Job.php`

```php
  use Illuminate\Support\Arr;

  public class Job {
    public static function all(): array
    {
      $jobs = [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ];

        return $job;
    }

    public static function find(int $id): array
    {
      $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

      if(! $job){
        abort(404);
      }
    }
  }
```

## EP08

1. Remove name field and add first_name and last_name for user migration file

```php
    Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
```

2. Run `php artisan migrate:fresh`

3. Run `php artisan make:migration create_job_listings_table` and edit the created migration file

```php
    Schema::create('job_listings', function (Blueprint $table){
        $table->id();
        $table->string('title');
        $table->string('salary');
        $table->timestamps();
    });
```

4. Run `php artisan migrate`

5. Use Table Plus and copy job data within App\Models\Job::all() to the sqlite database

## EP09

1. Edit `job.php` model. `/Jobs` route and `/job/{id}` route should continue to work

```php
  use Illuminate\Database\Eloquent\Model;

  public class Job extends Model {
    // refer to db table job_listings
    protected $table = 'job_listings';
  }
```

2. Run these command

```bash
> php artisan tinker
> App\Models\Job::create(['title' => 'Acme Director', 'salary' => '$1,000,000']);
> Illuminate\Database\Eloquent\MassAssignmentException Add [title] to fillable property to allow mass assignment on [App\Models\Job]

```

3. Edit `Models\Job.php`

```php
  use Illuminate\Database\Eloquent\Model;

  public class Job extends Model {
    // refer to db table job_listings
    protected $table = 'job_listings';
    protected $fillable = ['title', 'salary'];
  }
```

4. Repeat the commands at `step 2` to create a record.

## EP10

1. Edit `UserFactory.php`. Replace `'name'` to `'first_name'` and `'last_name'`

```php
// UserFactory.php
public function definition(): array
{
    return [
        'first_name' => fake()->firstName(),
        'last_name' => fake()->lastName(),
        ...
    ];
}
```

2. Run commands

```bash
> php artisan tinker
> App\Models\User::factory()->create()
# Create 100 user record in db
> App\Models\User::factory(100)->create()
> php artisan make:factory JobFactory
```

3. Edit `JobFactory.php`. Include `'title'` and `'salary'`.

```php
class JobFactory extends Factory
{
    public function defintion(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'salary' => '$50,000 USD'
        ];
    }
}
```

4. Run commands

```bash
> php artisan tinker
> App\Models\Job::factory()->create()

BadMethodCallException Call to undefined method App\Models\Job::factory()
```

5. Edit `Job.php`

```php
// Models\Jpn.php
use Illuminate\Database\Eloquent\Factories\HasFactory

class Job extends Model {
    use HasFactory;
}
```

6. Re-run `step 4` and create additional 300 job records. Check the sqlite db record with Table Plus

```bash
> App\Models\Job::factory(300)->create()
```

7. To have an unverified user run the following command

```bash
> php artisan tinker
> App\Models\User::factory()->unverified()->create()
```

8. Run `php artisan make:model Employer -m`

9. Edit `create_employers_table` migration file and add `$table->string('name');`

```php
    Schema::create('employer', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        ...
    });
```

10. Edit `create_job_listings_table` migration file and add relationship with Employer Model.

```php
    Schema::create('job_listings', function (Blueprint $table){
        $table->id();
        $table->foreignIdFor(\App\Models\Employer::class);
        ...
    });
```

11. Run `php artisan migration:fresh`

12. Edit `JobFactory.php` to include `'employer_id'`

```php
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'employer_id' => Employer::factory(),
            ...
        ];
    }
```

13. Run `php artisan make:model Employer -f` to create the model and factory.

14. Edit the newly created `EmployerFactory.php` to add `'name'` attribute

```php
    public function definition(): array
    {
        return [
            'name' => fake()->company()
        ];
    }
```

15. Run the following commands

```bash
> php artisan tinker
> App\Models\Job::factory(10)->create()
```

## EP11

1. Create belongs to relation for `Job Model`

```php
    class Job extends Model {
        use HasFactory;

        protected $table = 'job_listings';

        protected $fillable = ['title', 'salary'];

        public function employer() {
            return $this->belongsTo(Employer::class);
        }
    }
```

2. Run this commands to get Employer of a Job.

```bash
> php artisan tinker
> $job = App\Models\Job::first();
> $job->employer;
> $job->employer->name;
```

3. Create has many relation for `Employer Model`

```php
    class Employer extends Model {
        use HasFactory;

        public function jobs() {
            return $this->hasMany(Job::class);
        }
    }
```

4. Run this commands to get Jobs belong to Employer.

```bash
> php artisan tinker
> $employer = App\Models\Employer::first();
> $employer->jobs;
> $employer->jobs[0];
> $employer->jobs->first();
```

## EP12

1. Create Tag model with migration and factory

```bash
> php artisan make:model Tag -mf
```

2. Edit `create_tags_table` migration file to include name field. Next create pivot table with the name og `'job_tag'` for many to many relationship. Edit down function to drop `'job_tag'` table.

```php
  public function up(): void {
    Schema::create('tags', function(Blueprint $table){
      $table->id();
      $table->string('name');
      $table->timestamps();
    });

    Schema::create('job_tag', function(Blueprint $table){
      $table->id();
      // explicitly declare the foreign id to as job_listing_id
      $table->foreignIdFor(App\Models\Job::class, 'job_listing_id')->constrained()->cascadeOnDelete();
      $table->foreignIdFor(App\Models\Tag::class)->constrained()->cascadeOnDelete();
      $table->timestamps();
    });
  }

  public function down(): void {
    Schema::dropIfExits('tags');
    Schema::dropIfExits('job_tag');
  }
```

3. If we performed a migration and edited migration file we can perform this command to reflect the new changes `php artisan migrate:rollback && php artisan migrate`

4. To turn on delete on cascade for SQLite run this SQL statement `PRAGMA foreign_keys=on`

5. Create many to many relationship on models file

```php
    // Models\Job.php
    class Job extends Model {
        ...

        public function tags() {
            return $this->brlongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
        }
    }

    // Models\Tag.php
    class Tag extends Model {
        ...

        public function jobs() {
            return $this->brlongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
        }
    }
```

6. Create a record in `job_tag` pivot table with `job_listing_id` of 10. Try to retrieve the record of many to many relationship

```bash
> php artisan tinker
> $job = App\Models\job::find(10);
> $job->tags;
```

7. Add a many to many relationship record. Attach Tag record with id 7 to Job record with id 10

```bash
> php artisan tinker
> $job = App\Models\job::find(10);
# method 1
> $job->tags()->attach(7);
# method 2
> $job->tags()->attach(App\Models\Tag::find(7));
# grab all fields
> $job->tags()->get();
# grab single field
> $job->tags()->get()->pluck('name');
```

## EP13

1. Edit `jobs.blade.php`

```php
<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">
                    {{ $job->employer->name }}
                </div>
                <div>
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach
    </div>
</x-layout>
```

2. Resolving N+1 problem. Navigate to github.com/barryvdh/laravel-debugbar. Install debugbar

```bash
> composer require barryvdh/laravel-debugbar --dev
```

3. Resolve the N+1 problem with eager loading. Edit web.php

```php
Route::get('/jobs', function(){
    $jobs = Job::with('employer')->get();

    return view('jobs', ['jobs' => $jobs]);
});
```

4. Lazy loading can be disable at `AppServiceProvider.php`

```php
    public function boot(): void {
        Model::preventLazyLoading();
    }
```

## EP14

1. Pagination. Edit `/jobs` route to paginate with 3 records for each page.

```php
// web.php
Route::get('/jobs', function(){
    $jobs = Job::with('employer')->paginate(3);
    // simplePaginate: page show previous and next button
    // $jobs = Job::with('employer')->saimplePaginate(3);
    // cursorPaginate: page show previous and next button
    // $jobs = Job::with('employer')->cursorPaginate(3);

    return view('jobs', ['jobs' => $jobs]);
});
```

2. Edit `jobs.blade.php` to include pagination links

```php
    @endforeach

    <div>
        {{ $jobs->links() }}
    </div>
```

3. If we need to manually edit the pagination code then run the following command

```bash
> php artisan vendor:publish
# select from the list
> laravel-pagination
# a list of pagination blade view will be available
```

4. We can select the pagination template by editing `AppServiceProvider.php`

```php
public function boot(): void {
    Model::preventLazyLoading();
    Paginator::useBoostrapFive();
}
```
