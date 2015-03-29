<?php
//connect to mysql db
    $con = mysql_connect("localhost","root","Surf2010","metrics") or die('Could not connect: ' . mysql_error());
    //connect to the employee database
    mysql_select_db("metrics", $con);


//read the json file contents
$jsondata = file_get_contents('http://localhost/~compagnb/sessionsV3/data/basis-data-metrics.json');

//convert json object to php associative array
$result = json_decode($jsondata, true);

//build arrays for info
 $report_date = array();
   $heartrates = array();
   $steps = array();
   $calories = array();
   $gsrs = array();
   $skintemps = array();
   $airtemps = array();

 // Parse data from JSON response
   //$json = json_decode($result, true);
   $report_date = $result['starttime']; // report date, as UNIX timestamp
   $heartrates = $result['metrics']['heartrate']['values'];
   $steps = $result['metrics']['steps']['values'];
   $calories = $result['metrics']['calories']['values'];
   $gsrs = $result['metrics']['gsr']['values'];
   $skintemps = $result['metrics']['skin_temp']['values'];
   $airtemps = $result['metrics']['air_temp']['values'];

    //insert into mysql table
    $sql = "INSERT INTO heartrates( metrics_heartrate_values_list)
    VALUES('$heartrates')";

   //insert into mysql table
   if(!mysql_query($sql,$con))
    {
        die('Error : ' . mysql_error());
    }
?>?>
