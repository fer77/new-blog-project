## 7 Eloquent

**Eloquent** is Laravel's active record implementation.

**model** The representation of something in your system.
`php artisan make:model Task` This will be stored within the app directory.

**Query scope** A wraper around a particular query.

`php artisan tinker` Boots up Laravel's shell:
**control+c** to refresh after making a change to the code.
  `App\Task::all()` Fetches all tasks in our application.
  `App\Task::where('id', '>', 2)->get();` Fetches tasks greater than _2_
  `App\Task::pluck('body');` Fetches the _body_ of every record.
  `App\Task::pluck('body')->first();` Fetches the _body_ of the first record.
  `$task = App\Task::first();`
  `App\Task::where('completed', 0)->get();` All uncompleted tasks.

`php artisan make:model Task -m` Creates _CreateTasksTable_ migration file and _Task_ model.  `-m` This flag creates a new migration file for the model.

### Workflow
---------------
Create a model `php artisan make:model <give it a name> -m`

## 8 Controllers

**Controllers (middleman)** Receives (delegates) a request (home-page) it compiles the data from the model and passes it to the view to be rendered.

Controllers are declared within our web.php and kept in app>Http>Controllers

### Creating a controller:
`php artisan make:controller TasksController` Will place our controller in our controller directory.

## 9 Route Model Binding

**Route model binding** When registering a rout your "wield card" needs to match your variable name.  What it does is a `Task::find(wildcard;)` for us.
