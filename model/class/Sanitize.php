<?php

    function sanitize($input){
        $sanitize = htmlentities($input);
        $sanitize = strip_tags($sanitize);
        return $sanitize;
    }

?>