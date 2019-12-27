<?php
session_start();
echo "<pre>";
echo print_r($_SESSION);
echo "</pre>";
if (isset($_SESSION['age'])) {
    echo "Age = : " . $_SESSION['age'];
}
?>