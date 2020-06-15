<?php
    if(isset($_POST['link'])){
        /*
            https://animeflv.net/ver/princess-connect-redive-1

            0) https://animeflv.net/ver/princess
            1) connect
            2) redive
            3[Ultimo]) 1
        */

        $link = $_POST['link'];

        $arrayCapitulos = explode("-", $link);
        
        $capitulo = end($arrayCapitulos);

        do{
            $ch =   curl_init();
                    curl_setopt($ch, CURLOPT_URL, $link);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $resultado = str_replace("\n", "", curl_exec($ch));

            preg_match_all('/{"server":"fembed","title":"Fembed","allow_mobile":true,"code":"(.*?)"}/im', $resultado, $fembed);

            if(isset($fembed[1][0])){
                $linkFembed = str_replace("\\", "", $fembed[1][0]);
                $linkDescarga = str_replace("/v/", "/f/", $linkFembed);
                $error = false;

                echo "$capitulo ) <a href='$linkFembed'>".$linkFembed. "</a> - <a href='$linkDescarga'>Descargar</a><br>";

                $link = str_replace("-".$capitulo, "-".($capitulo+1), $link);
                $capitulo = $capitulo+1;
            }else{
                $error = true;
            }
        }while($error == false);
    }
