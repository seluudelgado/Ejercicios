<?php
for ($i=0;$i<=25;$i++) {
    $abecedario[$i]=chr($i+65);
}
print_r($abecedario);
$aleatorio =rand(0,21);
for($i=0;$i<5;$i++)
{
    echo '<br>';
    echo chr($i+65+$aleatorio);
}
?>