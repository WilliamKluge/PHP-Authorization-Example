<?php
// Get the session ready
session_start();
// Then kill it
session_destroy();
// Then go to the login page
header('Location: login.php');
exit;