<?php
// Import main class
require "../classes/structure.class.php";

// Start session
Session::init();

// Check if logged in otherwise redirect to login page
// Structure::checkLogin();

// Load Header
Structure::header("Admin Panel - Project");

// Main Content Goes Here
echo('<main role="main" class="container mx-auto mt-3">');
Structure::topHeading("Admin Panel");
echo('<hr>
        <div class="row">
            <div class="col col-sm-12 col-md-12">
                <table class="table table-striped table-bordered table-hover">
                  <thead class="bg-warning text-white">
                    <tr>
                      <th scope="col">Student</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a href="admin/add_student.php" class="text-secondary">Add Student</a></td>
                    </tr>
                    <tr>
                      <td><a href="admin/view_students.php" class="text-secondary">manageStudent</a></td>
                    </tr>
                    <tr>
                    <td><a href="admin/std_attendence.php" class="text-secondary">Take attendence</a></td>
                   </tr>
                    <tr>
                    <td><a href="admin/time_table.php" class="text-secondary">create timetable  </a></td>
                   </tr>
                    </tbody>
                    </table>
            </div>
            
            <div class="col col-sm-12 col-md-12 col-md-offset-2 ">
            <table class="table table-striped table-bordered table-hover">
                  <thead class="bg-info text-white">
                    <tr>
                      <th scope="col">Teacher</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <td><a href="admin/add_teacher.php" class="text-secondary">Add Teacher</a></td>
                    </tr>
                    <tr>
                    <td><a href="admin/view_teachers.php" class="text-secondary">Manage teacher</a></td>
                    </tr>
                  </tbody>
                </table>
            </div>

          </div>
        </main>');

// Display Footer
Structure::footer();
