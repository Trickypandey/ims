<?php
// Import main class
require "../classes/student.class.php";
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("View Teachers - Student Panel");

// Main Content Goes Here
$student  = new Student();

echo('</tbody></table></main>');
$student->close_DB();

// Display Footer
Structure::footer();

// delete object
unset($student);
unset($struct);
