<?php
if (!isset($_SESSION['szavazva'])) print "

<h1>Automobilistici:</h1>
<form action='szavazas_ir.php' method='post' target='kisablak'>
    <input type='radio' name='marka' value='1'>Alfa Romeo <br>
    <input type='radio' name='marka' value='2'>Lamborgini<br>
    <input type='radio' name='marka' value='3'>Ferrari <br>
    <input type='radio' name='marka' value='4'>Fiat <br>
    <input type='submit' value='vote'>
</form>
<iframe name='kisablak'></iframe>
";
else {
    $fp = fopen("szavazas.txt" , "r");
    $sz = fread($fp , filesize("szavazas.txt"));
    fclose($fp);
    $szazalek = $allas = array(0,0,0,0,0);
    for ($i=0; $i < strlen($sz); $i++) { 
        if ($sz[$i]==1) $allas[1]++;
        if ($sz[$i]==2) $allas[2]++;
        if ($sz[$i]==3) $allas[3]++;
        if ($sz[$i]==4) $allas[4]++;
    }

    $osszdb = strlen($sz);
    print "szavazas allasa: $sz <br>";
    
    $auto = array("", "alfa romeo","lamborgini","ferrari","fiat");
    for ($i=1; $i <=4; $i++) { 
        $szazalekos = round($allas[$i]/$osszdb*100);
        print "<cimke>$auto[$i]</cimke> : <oszlop title="$allas[i]" db : style='width: $szazalekos;'> </oszlop><br>";
    }
} 
?>

<style>
    oszlop{
        display:inline-block;
        height: 12px;
        background-color:#260;
    }
    cimke{
        display:inline-block;
        width: 70px;
        text-align:right;
    }
</style>