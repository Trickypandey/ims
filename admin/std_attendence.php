<?php
// Import main class
require "../classes/admin.class.php";
require "../classes/structure.class.php";
error_reporting(10);
// $a = ['a' => 2];
// Start session
Session::init();
// print_r($attend);
// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("Student Attendence - Admin");

// Main Content Goes Here
$admin    = new Admin();
$students = $admin->view_student(0, false,10);
if(count($_POST) > 0 ){
  $date = date('Y-m-d',time());
  foreach($_POST as $k => $v){
     $temp=$admin ->attendence($k,$v,$date,$_SESSION['uid']);
  }
}
echo('<main role="main" class="container mt-3  mx-auto">');
Structure::topHeading("Student Attendence");
echo('<form method="post"><hr>
        <table class="table table-striped table-hover text-secondary">
        <caption><a href="'.Structure::nakedURL("").'" style="text-decoration: none;">Go back!</a></caption>
        <thead class="bg-dark text-white">
        <select name="class" id="std">
          <option value=""disabled selected>choose your class </option>
          <option value="10">10</option>
          <option value="9">9</option>
          <option value="8">8</option>
        </select> 
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th>Attendance Status</th>
            <th>Attendance Date</th>
          </tr>
        </thead>
        <tbody>');

$counter = 0
;
foreach ($students as $student) {
    $counter++;
    // if ($student["subjects"] == "") {
    //     $student["subjects"] = "<span class='text-danger'>None</span>";
    // }
    // if ($student['teacher_name'] == "") {
    //     $student['teacher_name'] = "<span class='text-danger'>None</span>";
    // }

    echo('<tr>
        <td scope="row">'.$counter.'</td>
        <td>'.$student["name"].'</td>
        <td><a><select id="attend" name="'.$student["uid"].'"><option  value="1">present</option><option value="0">absent</option></select></td>
        <td><input type="date" value="'.date('Y-m-d').'" readonly="readonly"/></td>
        <div class="container">
            <div class="row">
              
            </div>
          </div>
        </td>
      </tr>');
}
echo('</tbody></table></main>');
echo(' <button type="submit">SUBMIT</button></form>');

$admin->close_DB();

// Display Footer
Structure::footer();

// delete object
unset($admin);
?>