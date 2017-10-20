<head>
    <meta charset="UTF-8">
</head>

<?php

    $strTextarea = $_POST['text'];
    $arrayTexarea = explode("\n", $strTextarea);

    $resultArray = [];
    for ($i = 0; $i < count($arrayTexarea); $i++){
        $arrayTexarea[$i] = trim($arrayTexarea[$i]);
        $str = $arrayTexarea[$i];
        $posEmail = strpos($str, '@');

        if (!$posEmail === false) {
            $pos = strpos($str, ' ');

            if (!$pos === false) {
                $key = substr($str, 0, $pos);
                $value = substr($str, $pos+1, strlen($str));
                $resultArray[$key] = $value;
            }
        }
    }

    foreach ($resultArray as $key => $value) {
        $file_name = "files/".strtr($key, " ", "_").".txt";
        //echo $file_name;
        if (!file_exists($file_name)){
            $file = fopen($file_name, "w");
            fclose($file);
        }
        else{
            continue;
        }
    }
    //var_dump($resultArray);


/*    if (!file_exists("files/log.txt")){
        $file = fopen("files/log.txt", "w");
    }
    else{
        $file = fopen("files/log.txt", "a+t");
    }

    $fileData = session_id()."_".$_SERVER['REQUEST_URI'];

    if (!strpos(file_get_contents("files/log.txt"), $fileData)){
        fwrite($file, $fileData.date("Y-m-d H:i:s")."\r\n");
    }
    else{
        fwrite($file, $fileData.date("Y-m-d H:i:s")."_повернення\r\n");
    }

    fclose($file);*/

?>