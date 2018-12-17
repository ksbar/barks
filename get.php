<?php
        $http_origin = $_SERVER['HTTP_ORIGIN'];
        if ($http_origin == "https://www.ksbar.org" || $http_origin == "https://site-ksbar.c9users.io/")
        {
            header("Access-Control-Allow-Origin: ".$http_origin);
        }
        header("Content-Type: text/plain");


        // declare/get a few variables
        $url = $_GET['url'];

        // create curl resource
        $ch = curl_init();

        curl_setopt_array($ch, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $url,
                CURLOPT_HTTPHEADER => array(
                          //'Accept: application/json' //,
                          //'Authorization: MYTOKEN'
                        )
                )
        );

        $resp = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);
        echo $resp;
?>