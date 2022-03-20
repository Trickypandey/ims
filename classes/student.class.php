<?php
require("database.class.php");

class Student extends Config
{
    // Function to list all the Teachers of a student & their subjects
    public function view_teachers()
    {
        $success = false; // variable to return if insertion success or failed

        // check if items to insert exists in the input array or note
        $view = $this->db->query("SELECT DISTINCT level2.uid, level2.name, level2.teacher_name, GROUP_CONCAT(DISTINCT subject.subject_name SEPARATOR ', ') AS subjects FROM (SELECT DISTINCT level.uid, level.name, level.phone_number, level.email, level.teacher_name, assigned.subject_id FROM (SELECT DISTINCT student.uid, student.name, student.phone_number, student.email, student.teacher_id, teacher.teacher_name FROM student LEFT OUTER JOIN teacher ON student.teacher_id = teacher.teacher_id) level NATURAL LEFT JOIN assigned) level2 NATURAL LEFT JOIN subject WHERE level2.uid = ? GROUP BY level2.uid ORDER BY level2.uid", $_SESSION["uid"]);

        if ($view->numRows() > 0) {
            $success = $view->fetchAll();
            return $success;
        }
        return $success;
    }

    // Other DB functions
    public function close_DB()
    {
        $this->db->close();
    }
}
