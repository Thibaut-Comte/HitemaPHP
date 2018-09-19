<?php
// indiqué le chemin de votre fichier JSON, il peut s'agir d'une URL


if(isset($_POST['VilleRecherche']))
{
    $json = file_get_contents("map.geojson");
    $parsed_json = json_decode($json);
    $parsed_json=$parsed_json->{'features'};
     
     $stack = array();

    for($i=0; $i<sizeof($parsed_json); $i++)
    {
     $valeurFind=$parsed_json[$i]->{'name'};
     if($valeurFind==$_POST['VilleRecherche'])
     {

        $stack[]=[$valeurFind, $parsed_json[$i]->{'id'}, $parsed_json[$i]->{'geometry'}->{'coordinates'}[0], $parsed_json[$i]->{'geometry'}->{'coordinates'}[1]];
        
        

     }
    }
    print_r($stack);

}
?>

