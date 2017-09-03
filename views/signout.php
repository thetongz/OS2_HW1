<?php
require "../utilities/redirect.php";

session_start();
session_destroy();
redirect("home");
?>