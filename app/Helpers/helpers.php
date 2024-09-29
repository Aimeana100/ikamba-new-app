<?php

// app/Helpers/helpers.php
if (!function_exists('generateRandomPassword')) {
    function generateRandomPassword($length = 8)
    {
        $upper = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $lower = 'abcdefghijklmnopqrstuvwxyz';
        $numbers = '0123456789';
        $special = '!@#$%^&*()-_=+[]{}|;:,.<>?';
        $allCharacters = $upper . $lower . $numbers . $special;

        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $allCharacters[random_int(0, strlen($allCharacters) - 1)];
        }

        return $password;
    }
}
