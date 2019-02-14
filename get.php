<?php        
        $http_origin = $_SERVER['HTTP_ORIGIN'];
        $type = isset($_GET['type']) ? $_GET['type']:'text/plain';
         if ($http_origin == "https://www.ksbar.org" || $http_origin == "https://site-ksbar.c9users.io" || $http_origin == "https://8080-dot-3118088-dot-devshell.appspot.com" || $http_origin == "https://site-ksbar.appspot.com")
         {
            header("Access-Control-Allow-Origin: ".$http_origin);
        }
        header('Access-Control-Allow-Origin: *');
  		header('Access-Control-Allow-Headers: Content-Length');
		header('Access-Control-Expose-Headers: Content-Length');
  		header('Timing-Allow-Origin: *');
        header("Content-Type: ".$type);

        // declare/get a few variables
        $endpoint = isset($_GET['q']) ? $_GET['q']:'https://www.ksbar.org/resource/rss/store.rss';

        // create curl resource
        $ch = curl_init();

        curl_setopt_array($ch, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $endpoint,
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
