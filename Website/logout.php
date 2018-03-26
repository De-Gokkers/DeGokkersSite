<?php
/*dit handelt het uitloggen af, nog steeds schrijf hier egnes passend in wat er moet gebeuren als je uitgelogds bent*/
session_start();

if(session_destroy()) {
    header("Location: index.php");
}
?>