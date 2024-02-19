<?php

    function connect() {
        $_SESSION[''] = $_POST['login'];
        if($_SESSION['']) {
            $login = 1;
        } else {
            $login = 0;
        }
        return $login;
    }
?>