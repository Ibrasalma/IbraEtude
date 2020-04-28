<?php

use App\Mail\ContactMessageCreated;
use Illuminate\Http\Request;

Route::view('/essai', 'pages.home_essai')->name('essai_path');
Route::view('/', 'pages.home')->name('root_path');
Route::view('/about', 'pages.about')->name('about_path');
Route::view('/bourse/create', 'bourses.create')->name('bourses.create');
Route::view('/privacy', 'pages.privacy')->name('privacy_path');
 
Route::resource('contact','ContactsController');
Route::resource('programmes','ProgrammeController');
Route::resource('users','UserController');
Route::resource('droits','DroitController');
Route::resource('bourses','BourseController');
Route::resource('universities','UniversityController');
Route::resource('stories','EtudiantStoryController');
Route::resource('avatars','UploadContactsController');
Route::resource('galeries','UploadGalerieController');
Route::resource('photos','UploadPhotoApplicationController');
Route::resource('autres','UploadautresController');
Route::resource('banks','UploadBankStatementController');
Route::resource('diplomes','UploadDegreeController');
Route::resource('degrees','UploadDegreeOriginalController');
Route::resource('langues','UploadLangueController');
Route::resource('medicals','UploadMedicalController');
Route::resource('criminals','UploadNonCriminalController');
Route::resource('passeports','UploadPasseportController');
Route::resource('plans','UploadPlanEtudeController');
Route::resource('letter1s','UploadPlanLetter1Controller');
Route::resource('letter2s','UploadPlanLetter2Controller');
Route::resource('releves','UploadTranscriptOriginalController');
Route::resource('transcripts','UploadTranscriptController');
Route::resource('formulaires','UploadFormulaireController');
Route::resource('applications','ApplicationController')->middleware('boursePlace');
Route::resource('backgrounds','EtudiantBackgroundController');
Route::resource('documents','UploadDocumentController');
Route::resource('avis','AviController');

Auth::routes(['verify'=>true]); 

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/bourse/liste', 'BourseController@liste')->name('bourses.liste');
Route::get('/university/liste', 'UniversityController@liste')->name('universities.liste');
Route::get('/students/liste','EtudiantStoryController@voir')->name('students.liste');
Route::get('/students/listing','EtudiantStoryController@listEtudiant')->name('students.appear');
Route::get('/students/liste/bourse','EtudiantStoryController@listeBourse')->name('etudiant.liste.bourse');
Route::get('/application/voir', 'EtudiantStoryController@liste')->name('stories.liste');
Route::get('/application', 'ApplicationController@info')->name('application_info')->middleware('application');
Route::get('/applicationEtape1', 'ApplicationController@etape1')->name('application_step1');
Route::get('/applicationEtape2', 'ApplicationController@etape2')->name('application_step2');
Route::get('/applicationEtape3','ApplicationController@etape3')->name('application_step3');
Route::get('/applicationEtape4', 'ApplicationController@etape4')->name('application_step4');
Route::get('/user/profile', 'UserController@profil')->name('profile_path');
Route::get('/application/modification','ApplicationController@modifie')->name('applications.modifie');
Route::get('/application/liste','ApplicationController@view')->name('application.voir');

Route::post('/bourse/view','BourseController@voir')->name('bourses.voir');
Route::post('/university/view','UniversityController@voir')->name('university.voir');
Route::post('/applicationEtape2/background','EtudiantStoryController@insert')->name('background.insert');
Route::post('/application/visualiser','ApplicationController@visualiser')->name('application.visualiser');
Route::post('/bourse/commentaire','AviController@comment')->name('bourse.comment');
Route::post('/bourse/note','AviController@note')->name('bourse.note');
