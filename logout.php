<?php
// Import main class
require "classes/structure.class.php";

Structure::header('logout');
Session::unset();
Session::destroy();
Structure::redirectHome();
