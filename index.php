<?php
include 'controllers/auth.php';
if (is_logged_in()) {
    header("Location: views/dashboard.php");
} else {
    header("Location: auth/login.php");
}
