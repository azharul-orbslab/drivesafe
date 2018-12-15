<?php
    session_start();
    unset($_SESSION['reporter']);

    header("Location: sign");
?>