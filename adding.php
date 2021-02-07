<?php

require_once "pdo1.php";

if(isset($_GET['temperature']) && isset($_GET['humidity']) && isset($_GET['moisture']) )
{
            $current_date=date("Y/m/d")." at ".date("h:i:sa");        
            $stmt = $pdo->prepare('INSERT INTO dht11
            (Temperature,Humidity,Moisture,Date) VALUES ( :temp, :humid,:moist,:dt)');
        $stmt->execute(array(
            ':temp' => htmlentities($_GET['temperature']),
            ':humid' => htmlentities($_GET['humidity']),
            ':moist' => htmlentities($_GET['moisture']),
            ':dt' => htmlentities($current_date)),
            
        );
        
        echo ("Inserted");
        return;
}
else
{
    echo("Invalid Values");
}       
?>

