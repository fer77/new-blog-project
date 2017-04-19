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

## 10 Layouts and Structure

`php artisan make:model Post -mc` Creates a Post model and both the migration and controller for it.

## 18 Associating Users with Comments

To create a new test user in our app:
`php artisan tinker`
`$user = new App\User;`
`$user->name = 'Gene Belcher'`
`$user->email = belchtoglory@email.com`
`$user->password = bcrypt('secret');` bcrypt() creates a token associated to this pass word.  This will not show the password in MySql.
`$user->save();`

##19

adding  `'password' => 'required|confirmed'` to our RegistrationController tells Laravel to look for a "password_required" in one of out inputs on the form field.

##20

How to use eloquent to make SQL queries.

SQL:
`select
	year(created_at) year,
	monthname(created_at) month,
	count(*) published
from posts
group by year, month`

Eloquent:
`App\Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')->groupBy('year', 'month')->get()->toArray();`

Carbon:
`Carbon\Carbon::parse('May');` returns an instance of May.
`Carbon\Carbon::parse('May')->month;` returns the month #
`Carbon\Carbon::parse('May')->year;` returns 2017
`Carbon\Carbon::parse('May')->day;` returns day #

## 22 Testing
**test>feature**: For the largest features.
**unit**: Lower level features.

To get started enter `phpunit` if vendor/bin/ is not in our path type out `vendor/bin/phpunit`

Laravel offers model factories: database>factories>modelFactory.
**modelFactory** The blueprint for an eloquent model.  New records (dummy records) can be saved to the database(not persisted, unles "create()" is passed instead of "make()").  Passing a number as a second argument will create that many "fake" users:
`php artisan tinker`
`factory('App\User', #)->make();`

These dummy posts should go into a custom test SQL database:
`mysql -uroot -p`
`create database blog_testing;`

## 23
If we wanted to move methods from our PostsController.php and make them into more dedicated classes.

**Automatic Dependency injection** or **Automatic resolution** Included with laravel.  If we want an instance of a class we can pass it as an argument in one of our functions:
`function(Posts $posts)...`

## 24
Helper functions:
View => view()
Request => request()
App => app()

To bind into a container you must provide a class path, i.e. `App\Billing\Stripe`
A lot of the services we make will be stored in config->services.php
To use something from the config file provide the name of the config file and access them with dot notation `services.stripe.secret`.
Do not reference things in your config files, instead reference environment variables.  Store secrete keys in our .env file.

**singleton** single instance of our class.  Builds up the exact same instance, not building up a new one every time.

## 25
**Service container**: Registers any key into the container and associate it with some value.

**service containers** are loaded through: config->app->**'providers'**:
These are the building blocks of **Laravel**.  In here we have Laravel Framework Service Providers... and Package Service Providers... and Application Service Providers... where we can register providers for our project, i.e. `php artisan make:provider SocialMediaServiceProvider`

## 26
How does Laravel send email:
config->mail.php There we can specify one of many supported mail drivers.
mailtrap.io works well for testing email.
email from address can be changed rom config/mail.php there's a global from address.

## 27
`php artisan make:mail WelcomeAgain --markdown="emails.welcome-again` instead of referencing a `->view` it references `->markdown`, it also generets a component to use in our `welcome-again.blade.php` and provides inline styles to our email.

To try this out:
`php artisan tinker`
`Mail::to($user = App\User::first())->send(new App\Mail\WelcomeAgain($user));`
Check mailtrap.

To customize an email:
`php artisan vendor:publish --tag=laravel-mail` Publishes only the ones with the `laravel-mail` Makes a vendor/mail/markdown folder with all the components in the email.  Styles will be under vendor/mail/html/promotion/themes/default.css  To reflect these changes update config/mail.php under markdown => theme.

## 28
What is it requesting:
`php artisan make:request RegistrationRequest`
`class RegistrationRequest extends FormRequest` This means that **RegistrationRequest** is a child of **FormRequest** and can access any of the fields in the form just by referencing them.

When a form request class is typed end the logic within that method will never execute unless the validation passes.

How do we know when to call the validate method in the controller and when to create a dedicated form request?
Keep it as simple as needed.  If only a few fields are validated, it can stay in a controller.  But when it is more intensive with a lot of logic it is better to extract a dedicated form request class.

**Form Request classes** it can be thought of a dedicated form object.  A dedicated form class that can protect itself throu validation rules and can persist itself.

## 29
We use sessions because HTTP is stateless, this means that data won't persist from page to page. Sessions offer a mechanism to maintain state for a particular user across any number of requests.
Sessions will exist for the length of the user's session and regenerated each time you sign in.  However, flash is available for only one page load. 

1. visit the controller where you wish to alert the user. Usually this will be before you redirect somewhere.

## 30
Associating tags with posts.  Structure:

1. Table for posts and table for tags.
2. associate one post with one tah.

**Pivot tables** post_tag

`php artisan make:model Tag -m`

In our table the `$table->interger('post_id');` and `$table->interger('tag_id');` creates the relationship between the tags and the posts.  This will be a many to many relationship (Post.php), because one post may have many tags and any tag may be applied to many posts.

`php artisan migrate`

## 31

How do we deal with route model binding when we are not using the primary key as the identifier?

## 32

**Events** A particular thing in your application of significance that took place: "order processed", "post archived", or for "thread created".  Significant actions that have taken place in the past, that are now alerting the rest of the aplication. "when a happens b and c will trigger".
**make:event** a plain php object.
**make:listener** one or more classes that want to respond to the event that just took place.

an **event** and **listener** will do nothing unless registered in an **EventServiceProvider**.

`event:generate` will read `EventServiceProvider.php` fetch the `$listen` array filter through it and build any file that haven't been created.
`php artisan event:generate`

`php artisan make:listener CheckForSpam --event="ThreadCreated"`

Even though this is easy to use don't reach for it everytime you need something a controller can handle.  Use this when there are a number of things that will need to respond to an action or situation.