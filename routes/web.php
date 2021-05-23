<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('FrontEnd.home');
});


Auth::routes();

Route::get('/teacher_login', "auth\LoginController@login_teacher")->name('teacher_login');


Route::get('/admin_login', "auth\LoginController@login_admin")->name('admin_login');



//////////////////////students routes/////////////
Route::prefix("student")->middleware(["auth", "isstudent"])->group(function () {

    Route::get('/choose_master', 'Student\profileController@choose_master')->name('home_student');


    Route::get('/findmaster', "Student\profileController@findmaster")->name('findmaster');
    Route::post('/choisir_master', "Student\profileController@choisir_master")->name('choisir_master');
    Route::get('/student_profile/{inscrit_id}', "Student\profileController@student_profile")->name('student_profile');
    Route::post('/student_profile_update', "Student\profileController@update_profile")->name('student_profile_update');
    Route::get('/student_folder/{inscrit_id}', "Student\profileController@dossier_page")->name('student_folder');
    Route::post('/student_dossier_update', "Student\profileController@dossier")->name('student_dossier_update');
    Route::get('/Anneescolaire_page/{inscrit_id}', "Student\AnneescolaireController@Anneescolaire_page")->name('Anneescolaire_page');
    Route::get('/findetablissement', "Student\AnneescolaireController@findetablissement")->name('findetablissement');
    Route::get('/findfiliere', "Student\AnneescolaireController@findfiliere")->name('findfiliere');
    Route::post('/submit_data', "Student\AnneescolaireController@submit_data")->name('submit_data');


});
//////////////////////end students routes/////////////

/// ///////////////teacher routes////////////
Route::prefix("teacher")->middleware(["auth", "isteacher"])->group(function () {
    Route::get('/', 'HomeController@index')->name('home_teacher');
    //to add
    Route::get('/show_master', 'Teacher\TeacherController@show_master')->name('show_master');
    /////
    Route::get('/profile_teacher/{id_master}','Teacher\TeacherController@home_teacher')->middleware('ismasterteacher');
    Route::get('/show_add_critere', 'Teacher\TeacherController@show_add_critere')->name('show_add_critere');
    Route::post('/add_critere/{id_m}', 'Teacher\CritereController@add_critere')->name('add_critere');

//    Route::get('/profile_teacher/{id_master}','Teacher\TeacherController@home_teacher')->name('profile_teacher');

});
/// ///////////////end teacher routes////////////


///////////////////////admin routes//////////////////////
Route::prefix("admin")->middleware(["auth", "isadmin"])->group(function () {
    Route::get('/home_admin', 'HomeController@home_admin')->name('home_admin');

    Route::get('/add_master', 'Admin\MasterController@Show_add_master_page')->name('add_master');
    Route::get('/manage_master', 'Admin\MasterController@Show_master_page')->name('manage_master');
    Route::post('/add_master_page','Admin\MasterController@add_master')->name('add_master_page');
    Route::get('/update_master/{id_master}','Admin\MasterController@Show_update_master_page')->name('update_master');
    Route::post('update_master_page','Admin\MasterController@updt_etab_page')->name('update_master_page');
    Route::post('delete_master','Admin\MasterController@delete_master')->name('delete_master');
    /////////////////////////////////////////////
    Route::get('/University', 'Admin\EtablissementController@show_university_page')->name('University');

    Route::get('/manage_etablissement', 'Admin\EtablissementController@Show_etablissement_page')->name('manage_etablissement');
    Route::get('/show_add_etablissement', 'Admin\EtablissementController@Show_add_etablissement_page')->name('show_add_etablissement');
    Route::post('/add_etablissement', 'Admin\EtablissementController@add_etablissement')->name('add_etablissement');
    Route::get('/show_update_etablissement/{id_etab}','Admin\EtablissementController@update_etablissement')->name('show_update_etablissement');
    Route::post('update_master_page','Admin\EtablissementController@update_etablissement_page')->name('update_master_page');
    Route::get('/delete_etab/{id_e}','Admin\EtablissementController@delete_etab')->name('delete_etab');

    //////////////////////////////////////////////////////////
    Route::get('/manage_filiere', 'Admin\FiliereController@Show_filiere_page')->name('manage_filiere');
    Route::get('/show_add_filiere', 'Admin\FiliereController@show_add_filiere')->name('show_add_filiere');
    Route::post('/add_filiere', 'Admin\FiliereController@add_filiere')->name('add_filiere');
    Route::get('/update_filiere/{id_master}','Admin\FiliereController@Show_update_filiere_page')->name('update_filiere');
    Route::post('update_filieres','Admin\FiliereController@update_filieres')->name('update_filieres');
    Route::get('/delete_filiere/{id_e}','Admin\FiliereController@delete_filiere')->name('delete_filiere');
    //////////////////////////////////////////////////////////
    Route::get('/manage_teacher', 'Teacher\TeacherController@Show_teacher_page')->name('manage_teacher');
    Route::get('/add_teacher_page', 'Teacher\TeacherController@Show_add_MJ_page')->name('add_teacher_page');
    Route::post('/add_teacher', 'Teacher\TeacherController@add_teacher')->name('add_teacher');
    Route::get('/teacher_master/{id_m}', 'Teacher\TeacherController@show_teacher_master')->name('teacher_master');
    Route::get('/show_teacher_master', 'Teacher\TeacherController@show_teacher_master')->name('show_teacher_master');

    ////////////////////////////////////////////////
    Route::get('/teacher_master/print_teacher/{id_m}', 'PrintController@print_teacher')->name('print_teacher');




});
///////////////////////end admin routes//////////////////////



