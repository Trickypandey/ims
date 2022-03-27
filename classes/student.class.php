<?php
require("database.class.php");

class Student extends Config
{
    // Function to list all the Teachers of a student & their subjects
  

    // Other DB functions
    public function close_DB()
    {
        $this->db->close();
    }
}
