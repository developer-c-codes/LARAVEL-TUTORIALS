<?php

              // BASIC ROUTE SYNTAX
Route::get('/hello', function () {
    return  "Hello, chenje!";
});

// Route::get -> mean to get request
// '/hello' -> user URL
// function(){} callback function that will be executed when user access the URL
// return "Hello, chenje!" -> responce sent back to the user

               // ROUTES FOR BLADE VIEW
Route::get('/about' , function () {
    return view ('about');
});
// return view('about) -> loads the about.blade.php file from resources/views folder
// this is the way to linkn routes and frontend views in laravel

               //ROUTES WITH PARAMETERS
    //1.required parameters
Route::get('/user/{name}', function ($name) {
    return "User name is " .$name;
});
// {name} -> required parameter that added to the URL 
// $name -> variable that captures the value of the parameter is added to the callback function

    //2.optional parameters
Route::get('/user/{name}', function ($name = 'Guest') {
    return "hello, " .$name;
});
// $name = Guest -> default value assigned to the parameter in case user does not provide any value

                // NAMED ROUTES 
Route::get('/contact', function ()  {
    return view('contact');
})->name ('contact.page');
// ->name('contact.page') -> assigns a name to the route
// in html youll add like <a href="{{ route('contact.page') }}">contacr us</a>

                 //ROUTES + CONTROLLERS
Route::get('/contact', [ContactController::class, 'showForm'])->name ('contact.form');      //contactcontroller@showform -> displays form
Route::post('/contact', [ContactController::class, 'submitForm'])->name ('contact.submit'); //contactcontroller@submitform -> process submission

                //MIDDLEWARE IN ROUTES
Route::get('/dashboard', function () {
    return view ('dashboars');  
})->middlware('auth');          //only logged-in users can access this route
