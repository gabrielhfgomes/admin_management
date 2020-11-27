<?php
    function validatePassword($password, $loginInfo) {
        $hashed_password = $loginInfo->password;
        if ( password_verify($password,$hashed_password) ) {
            return true;
        } else {
            return false;
        }
    }