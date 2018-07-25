<?php
        // declare/get a few variables
        $base = 'http://www.kslegislature.org/li/api/';
        $ver = $_GET['version'];
        $listing = $_GET['listing'];
        $detail = $_GET['detail'];
        $status = $_GET['status'];
        $url = $base.$ver."/rev-1/".$listing."/".$detail."/";

        // create curl resource
        $ch = curl_init();
        // set url
        //curl_setopt($ch, CURLOPT_URL, $url);

        //return the transfer as a string
        //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        //$output = curl_exec($ch);

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