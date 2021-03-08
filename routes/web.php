<?php

use Illuminate\Support\Facades\Route;
use App\Models\Student;
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
    return view('welcome');
});

Route::get('/insert', function () {
DB::insert('insert into students(id,name,date_of_birth,gpa,advisor) values(?,?,?,?,?)',
	[1,"Arsen","2002-04-01",3.03,"Zhangir Rayev"]
);
});


Route::get('/select', function () {
    $result=DB::select('select * from students where id =?',[1]);
    foreach ($result as $students) {
    	echo "id :".$students->id;
    	echo "<br>";
    	echo "name :".$students->name;
    	echo "<br>";
    	echo "date_of_birth :".$students->date_of_birth;
    	echo "<br>";
    	echo "gpa :".$students->gpa;
    	echo "<br>";
    	echo "advisor :".$students->advisor;
    	echo "<br>";
    }
});

Route::get('/update', function () {
    $updated =DB::update('update students set gpa=3.2 where id=?',[1]);
    return $updated;
});
Route::get('/delete', function () {
    $delete =DB::delete('delete from students where id = ?',[1]);
    return $delete;
});

Route::get('/getAll', function () {

    $student=Student::all();
    foreach ($student as $students) {
    	echo $students->id;
    	echo "<br>";
    	echo $students->name;
    	echo "<br>";
    	echo $students->date_of_birth;
    	echo "<br>";
    	echo $students->gpa;
    	echo "<br>";
    	echo $students->advisor;
    	echo "<br>";
    }
});
Route::get('/find',function(){
    $student = Student::find(1);
    return $student-> gpa;
});

Route::get('/basicUpdate',function(){
    $student = Student::find(1);
    $student-> advisor = 'Ualikhan Sadyk';
    $student->save(); 
});
Route::get('/basicDelete',function(){
    $student = Student::find(1);
    $student->delete();
  
});
Route::get('/basicInsert',function(){
    $student = new Student;

    $student-> id = 2;
    $student-> name  = 'Beksultan';
    $student-> date_of_birth  = '2001-07-07';
    $student-> gpa  = 3.99;
    $student-> advisor  = 'Sultan Kosen';
    $student->save(); 
});