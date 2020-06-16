<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Scraper Capitulos AnimeFLV by DickyM</title>
</head>
<body>
    <form method="post">
        <div class="centro">
            <h2>Ingresa el link del capitulo donde quieres comenzar a extraer</h2>
            <a id="color" href="https://github.com/DickyMontiel/AnimeFLV-Caps-Extractor/" target="_blank">Descargar Codigo</a>
            <br><br>
            <input type="url" name="link" required>
            <br><br>
            <button type="submit">Extraer</button>
            <br><br>
        </div>
    </form> 

    <div class="divResultado">
        <h2>Capitulos:</h2>
        <?php
            if(isset($_POST['link'])){
                //https://animeflv.net/ver/princess-connect-redive-1
        
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
        
                        echo "$capitulo ) <a id='color' target='_blank' href='$linkFembed'>".$linkFembed. "</a> - <a id='color' target='_blank' href='$linkDescarga'>Descargar</a><br>";
        
                        $link = str_replace("-".$capitulo, "-".($capitulo+1), $link);
                        $capitulo = $capitulo+1;
                    }else{
                        $error = true;
                    }
                }while($error == false);
                echo "<br><br>";
            }
        ?>
    </div>
</body>
</html>