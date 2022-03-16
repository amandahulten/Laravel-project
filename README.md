# Instalite

![alt](https://images.squarespace-cdn.com/content/v1/53e5e8b4e4b0f39bef5e536c/1547215347117-K32R85XZK26R5HV1J48L/new-post.gif?format=2500w)

A laravel project by [Amanda Hultén](https://github.com/amandahulten) and [Emma Ramstedt](https://github.com/deliciaes), representing class WU21, Yrgo.

## Instructions for installation
1. Clone the repository
2. Open the project in VSCode or your workspace of choice.
3. Copy the data in .env.example in to a new .env file.
4. Fill in your database name, username and password and save your .env file.
5. Make sure to install the following: PHP, npm node.js, composer.
6. Runcommand: composer update
7. Generate a key by typing in to the terminal: php artisan key:generate
8. Install the database by typing in to the terminal: php artisan migrate
9. Now you can run a local server to view the website by typing in the terminal: php artisan serve
10. Create a user (or many users), log in, and poke around!


CODEREVIEW by [Neo](https://github.com/neoisrecursive) & [Albin](https://github.com/itisalbin):

1. UseFormController could be replaced with a Route::View('/createaccount', (the.view.file)).
2. same for viewAddPhotoController
3. CommentsController could be replaced with an invokable controller since it only contains one method.
4. Use middleware groups on routes to minimize repetition.
5. Categorize your controllers with folders, makes it easier to find especially when you are using invokable.
6. Same as above but with the view files.
7. Fillables on Photo Model are not used.
8. New Photo model instance (PhotosController:40) should be named 'photo' instead of 'database'.
9. Be consistent with using invokable controllers or not.
10. The Like-Model (like.php:20) instead -> 'return $this->belongsTo(Photo::class);'.
11. You have multiple feed.css files.
12. Also multiple feed.scss files, public/resources/css & resources/css
13. PhotoFeedWithLikes, instead of get() here you could do it in the controller, that way you could use paginate() if you wanted to limit the photos showed and speed up the site.
14. Delete comments on photo delete? not all db engines have built in cascade
15. You appear to be using both bootstrap and your own css? maybe choose just one
16. In your models you create "helper methods", nice!
17. PhotoFeedWithLikes method, the second join could be just join(table,on_fist,how,on_second) instead of join(table, func)
18. Also remove unused dependencies from package.json, for example Axios.
