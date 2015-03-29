<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('before' => 'newyear', 'uses' => 'HomeController@showWelcome'));
Route::get('about', 'AboutController@showAbout');
Route::get('about/directions', array('uses' => 'AboutController@showDirections',
    'as' => 'directions'));
Route::get('about/{theSubject}', 'AboutController@showSubject');



/*
Route::get('/', array(
    'before' => array('newyear','valentines','halloween','birthdate:03/08'),
    'after' => 'logvisits',
    function()
{
    return View::make('hello');
}));


Route::get('about', function()
{
    return 'ABOUT content';
});


Route::get('about/directions', array('as' => 'directions', function()
{
   $theURL = URL::route('directions');
   return "DIRECTIONS go to this URL: $theURL"; 
    
}));
*/
Route::any('submit-form', function()
{
    return 'Process FORM'; 
});

/*
Route::get('about/{theSubject}', function($theSubject)
{
    return $theSubject.' content goes here';
});
 */

Route::get('about/classes/{theSubject}', function($theSubject)
{
    return "Content on $theSubject";
});

Route::get('about/{art}/{specialty}', function($art, $specialty)
{
    return "Your type of art is: $art <br /> And your type of specialty is: $specialty";    
});

Route::get('where', function(){
 return Redirect::route('directions');   
});

Route::get('vote', array(
    'before' => 'age:15',
    function()
    {
        return 'Vote!';
    }
));

Route::get('birthday', array(
    'before' => 'birthday:1:3',
    function()
    {
        return 'Sorry its not your birthday yet!';
    }
    
));

Route::get('programs', function()
{
   return View::make('programs'); 
});

Route::get('graphic-design', function()
{
   return View::make('graphic-design');
});

Route::get('signup', function()
{
   return View::make('signup'); 
});

Route::post('thanks', function()
                {
    $theEmail = Input::get('email');
    return View::make('thanks')->with('theEmail', $theEmail);
});

Route::get('data', function()
{
    /*
    $painting = Paintings::find(1);
    $painting->title = 'Do No Wrong - Just Do Right';
    $painting->save();
    return $painting->title;
     * 
     */
    
    echo '<pre>';
    
    $paintings = Paintings::where('year', "=", '2011')->get();
    var_dump($paintings->toArray());
    echo '</pre>';
});
