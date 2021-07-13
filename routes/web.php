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

Route::get('/master_rech','Admin\MasterController@master_recherche')->name('master_rech');
Route::get('/master_pro','Admin\MasterController@master_professionnel')->name('master_pro');
Route::get('/', function () {
    return view('FrontEnd.home');
});
Route::get('/xml','xmlcontroller@index');

Route::group(['middleware' => 'prevent-back-history'],function(){

Auth::routes(['verify'=>true]);
Route::get('/password_link','Teacher\TeacherController@password_link')->name('password_link');
Route::get('/error_function','ErrorController@error_function')->name('error_function');

    Route::get('/teacher_login', "auth\LoginController@login_teacher")->name('teacher_login');

    Route::get('/admin_login', "auth\LoginController@login_admin")->name('admin_login');
    Route::get('/admin_login', "auth\LoginController@login_admin")->name('admin_login');



//////////////////////students routes/////////////
Route::prefix("student")->middleware(["auth", "isstudent",'verified'])->group(function () {

    Route::get('/choose_master', 'Student\profileController@choose_master')->name('home_student');
    Route::post('/choisir_master', "Student\profileController@choisir_master")->name('choisir_master');


    Route::get('/findmaster', "Student\profileController@findmaster")->name('findmaster');
    Route::get('/student_profile/{inscrit_id}', "Student\profileController@student_profile")->name('student_profile');
    Route::post('/student_profile_update', "Student\profileController@update_profile")->name('student_profile_update');
    Route::get('/student_folder/{inscrit_id}', "Student\profileController@dossier_page")->name('student_folder');
    Route::post('/student_dossier', "Student\profileController@dossier")->name('student_dossier');
    Route::post('/modifier_dossier', "Student\profileController@modifier_dossier")->name('modifier_dossier');

    Route::get('/Anneescolaire_page/{inscrit_id}', "Student\AnneescolaireController@Anneescolaire_page")->name('Anneescolaire_page');
    Route::get('/findetablissement', "Student\AnneescolaireController@findetablissement")->name('findetablissement');
    Route::get('/findfiliere', "Student\AnneescolaireController@findfiliere")->name('findfiliere');
    Route::post('/submit_data', "Student\AnneescolaireController@submit_data")->name('submit_data');
    Route::get('/changer_mot_de_passe_page','Student\profileController@change_password')->name('page_changer_mot_de_passe');
    Route::post('/changer_mot_de_passe_done','Student\profileController@change_password_post')->name('changer_mot_de_passe');
    Route::get('/change_image','Student\profileController@change_image')->name('change_img');
    Route::post('/image_done','Student\profileController@change_image_post')->name('img_done');
    Route::post('/reo','Student\profileController@reo')->name('reo');

    Route::get('/details_page/{inscrit_id}','Student\CandidatureController@details_page')->name('details_page');

    ////annuler cadidature///
    Route::get('/annuler_candidature/{inscrit_id}', "Student\CandidatureController@annuler_candidature")->name('annuler_candidature');

/////////imprimer recu de candidture
    Route::get('/imprimer_recu', "PrintController@imprimer_recu")->name("imprimer_recu");
    Route::get('/imprimer_r/{inscrit_id}', "PrintController@imprimer_r")->name("imprimer_r");


});
//////////////////////end students routes/////////////

/// ///////////////teacher routes////////////
Route::prefix("teacher")->middleware(["auth", "isteacher"])->group(function () {
    Route::get('/', 'HomeController@index')->name('home_teacher');
    //to add
    Route::get('/show_master', 'Teacher\TeacherController@show_master')->name('show_master');
    Route::post('/critere/save', 'Teacher\TeacherController@saveCriteres')->name('addcritere');
    Route::post('/critere/update', 'Teacher\TeacherController@updateCriteres')->name('updatecritere');

    Route::get('/critere','CritereController@critere')->name('critere_page');
    Route::post('/add_critere','CritereController@addcritere')->name('add_critere');
    Route::get('/change_teacher_image','Teacher\TeacherController@change_teacher_image')->name('change_teacher_image');
    Route::post('/image_teacher_done','Teacher\TeacherController@image_teacher_post')->name('image_teacher_done');
    /////
    Route::get('/gerer_admission','Teacher\TeacherController@gerer_addmision_page')->name('gerer_addmision_page');
    ////
    ///Modification de profile d'un Enseignant(e)
    Route::get('/profile_teacher','Teacher\TeacherController@profile_teacher_page')->name('profile_teacher_page');
    Route::get('/update_profile_teacher_page','Teacher\TeacherController@page_update_profile_teacher')->name('update_profile_teacher_page');
    Route::post('/update_profile_teacher','Teacher\TeacherController@update_profile_teacher_post')->name('update_profile_teacher');
    ///Modification de profile d'un Enseignant(e)
    ///
    ///Changement de Mot de Passe  d'un Enseignant(e)
    Route::get('/teacher_change_password','Teacher\TeacherController@teacher_change_pass_page')->name('teacher_change_pass_page');
    Route::post('/teacher_change_password_done','Teacher\TeacherController@teacher_change_pass_post')->name('teacher_change_pass');
    ///Changement de Mot de Passe d'un Enseignant(e)

});
/// ///////////////end teacher routes////////////


///////////////////////admin routes//////////////////////
Route::prefix("admin")->middleware(["auth", "isadmin"])->group(function () {
    Route::get('/home_admin', 'HomeController@home_admin')->name('home_admin');

    Route::get('/add_master', 'Admin\MasterController@Show_add_master_page')->name('add_master');
    Route::get('/manage_master', 'Admin\MasterController@Show_master_page')->name('manage_master');
    Route::post('/add_master_page','Admin\MasterController@add_master')->name('add_master_page');
    Route::get('/update_master/{id_master}','Admin\MasterController@Show_update_master_page')->name('update_master');
    Route::post('update_master_page','Admin\MasterController@update_master')->name('update_master_page');
    Route::get('delete_master/{id}','Admin\MasterController@delete_master')->name('delete_master');
    Route::get('config_date_page/{id}','Admin\MasterController@config_date_page')->name('config_date_page');
    Route::post('configurer_date','Admin\MasterController@configurer_date')->name('configurer_date');
    Route::post('upt_configurer_date','Admin\MasterController@upt_configurer_date')->name('upt_configurer_date');



    Route::get('/admin_change_password','Admin\AdminController@change_pass_page')->name('change_pass_page');
   Route::post('/admin_change_password_done','Admin\AdminController@change_pass_post')->name('change_pass');
     //profile update pages
   Route::get('/update_profile_admin','Admin\AdminController@upd_profile_page')->name('upd_profile_admin');
   Route::get('/update_profile','Admin\AdminController@upd_profile')->name('upd_profile');
   Route::post('/update_profile','Admin\AdminController@update_profile')->name('update_profile');
    //profile update pages
    //image  update
    Route::get('/change_image_admin','Admin\AdminController@change_admin_image')->name('admin_change_img');
    Route::post('/image_admin_done','Admin\AdminController@image_admin_post')->name('img_admin_done');
    //image update
    /////////////////////////////////////////////

    Route::get('/manage_etablissement', 'Admin\EtablissementController@Show_etablissement_page')->name('manage_etablissement');
    Route::get('/show_add_etablissement', 'Admin\EtablissementController@Show_add_etablissement_page')->name('show_add_etablissement');
    Route::post('/add_etablissement', 'Admin\EtablissementController@add_etablissement')->name('add_etablissement');
    Route::get('/show_update_etablissement/{id_etab}','Admin\EtablissementController@update_etablissement')->name('show_update_etablissement');
    Route::post('update_etablissement','Admin\EtablissementController@updt_etab_page')->name('update_etab_page');
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

    ////////////////////////////////////////////////
    Route::get('/teacher_master/print_teacher/{id_m}', 'PrintController@print_teacher')->name('print_teacher');

    Route::get('/delete_teacher/{id_teacher}', "Teacher\TeacherController@delete")->name('delete_teacher');
///////////////////////////////////////////////////////

    Route::get('liste_admins','Admin\AdminController@liste_admin')->name('liste_admins');
    Route::get('show_add_admin_page','Admin\AdminController@show_add_admin_page')->name('show_add_admin_page');
    Route::post('add_admin','Admin\AdminController@add_admin')->name('add_admin');

    /////



});

});// prevent back middleware
///////////////////////end admin routes//////////////////////


