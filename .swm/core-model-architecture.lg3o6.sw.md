---
id: lg3o6
title: Core Model Architecture
file_version: 1.1.2
app_version: 1.4.5
---

# Overview

Core Model is a rename of old User Model. The first User Model contain duplicate 'name' fields, as it needs a 'name' field for session and 'firstname and lastname' for table. Since it was a bad code implementation for a Model, so we redesigned it back to function for table only, also change its name to more conventional name, Core Model.

## Migration

Migration file helps developer to design database schema in simpler way. The file located at `📄 database/migrations/2023_03_06_221638_create_cores_table.php`

## Factory

Factory helps seeding table with dummy data. The file located at `📄 database/factories/CoreFactory.php`

<br/>

Inside the class, we declare which model is associated with this factory class
<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 database/factories/CoreFactory.php
```hack
11     class CoreFactory extends Factory
12     {
13         protected $model = Core::class;
```

<br/>

Then, we use faker helper functions to generate dummy data. We can seed the model using tinker in terminal
<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 database/factories/CoreFactory.php
```hack
19         public function definition(): array
20         {
21             static $incrementing_number = 1;
22             return [
23                 'user_id'=>$incrementing_number++,
24                 'first_name' => fake()->firstName(),
25                 'last_name' => fake()->lastName(),
26                 'ppi' => fake()->numberBetween([1],[100]),
27                 'batch' => fake()->firstName(),
28     
29             ];
30         }
```

<br/>

# Model

The model is located at `📄 app/Models/Core.php`. It is the Eloquent Object-Relational Mapping (ORM) of Cores table.

# Controller

The controller is where the application logic is written. The file is located at `📄 app/Http/Controllers/CoreController.php`

<br/>

Since we are using Inertia, we need to import these two packages
<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 app/Http/Controllers/CoreController.php
```hack
8      use Inertia\Inertia;
9      use Inertia\Response;
```

<br/>

## Index

Index function is design to view Core Model in table

<br/>

Line 17-22<br/>
We assign cores as Core Model objects. We use **pagination** method in Laravel to paginate a number of objects per page, but we filter what data will be passed into the client using **through** method

Line 26-27<br/>
return the data at Core component page with parameter Core objects
<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 app/Http/Controllers/CoreController.php
```hack
16         public function index(): Response
17         {
18             $request = Request::input('search');
19             $cores = Core::query()
20                 ->orderBy('first_name')
21                 ->when($request,function($query,$search){
22                     $query->where('first_name', 'like', '%' . $search . '%')
23                         ->OrWhere('last_name', 'like', '%' . $search . '%')
24                         ->OrWhere('ppi', 'like', '%' . $search . '%')
25                         ->OrWhere('batch', 'like', '%' . $search . '%');
26                 })
27                 ->paginate(10)
28                 ->through(fn($core) => [
29                     'first_name' => $core->first_name,
30                     'last_name' => $core->last_name,
31                     'ppi' => $core->ppi,
32                     'batch' => $core->batch,
33             ])->withQueryString();
34     
35     
36     
37             return Inertia::render('Core',[
38                 'cores'=>$cores,
39             ]);
40         }
```

<br/>

# Route

<br/>

We use get requests at '/' url and use CoreController class with index method
<!-- NOTE-swimm-snippet: the lines below link your snippet to Swimm -->
### 📄 routes/web.php
```hack
19     Route::get('/',[CoreController::class,'index']);
```

<br/>

<br/>

<br/>

<br/>

This file was generated by Swimm. [Click here to view it in the app](/repos/Z2l0aHViJTNBJTNBaW1wcm9mZGJ2dWUlM0ElM0FtZGF6cmlu/docs/lg3o6).
