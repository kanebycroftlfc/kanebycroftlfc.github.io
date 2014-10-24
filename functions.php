<?php
function validateForm ($fieldArray)
{

    foreach ($fieldArray as $array) {
        if (empty($array)) {
            echo "please fill in all fields";
            exit;
        }
    }
}