<?php
session_start();
session_destroy();
session_commit();
session_unset();

header("Location: index.php");

?>