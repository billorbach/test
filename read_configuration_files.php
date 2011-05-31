<?php 
$File = "config/total_number_of_clones.txt"; 
$Handle = fopen($File, 'r');
$number_of_clones__ = fgets($Handle); 
fclose($Handle); 

$File = "config/powered_up_clones.txt"; 
$Handle = fopen($File, 'r');
$powered_up_clones__ = fgets($Handle); 
fclose($Handle); 

//echo $number_of_clones__;
//echo "</br>";
//echo $powered_up_clones__;
//echo "</br>";

$number_of_clones_=trim($number_of_clones__, " \t\r\n");
$powered_up_clones_=trim($powered_up_clones__, " \t\r\n" );

//echo $number_of_clones_;
//echo "</br>";
//echo $powered_up_clones_;
//echo "</br>";

$number_of_clones=intval($number_of_clones_);
$powered_up_clones=intval($powered_up_clones_);


//echo $number_of_clones;
//echo "</br>";
//echo $powered_up_clones;
//echo "</br>";

$File = "config/master_create.txt"; 
$Handle = fopen($File, 'r');
$Create__ = fread($Handle, 100); 
fclose($Handle); 

$File = "config/master_edit.txt"; 
$Handle = fopen($File, 'r');
$Edit__ = fread($Handle, 100); 
fclose($Handle);

$File = "config/working_version.txt"; 
$Handle = fopen($File, 'r');
$Work__ = fread($Handle, 100); 
fclose($Handle);

$Create_=trim($Create__, " \t\r\n");
$Edit_=trim($Edit__, " \t\r\n" );
$Create=intval($Create_);
$Edit=intval($Edit_);
$Work=trim($Work__, " \t\r\n" );


$Master="master" . $Create . "." . $Edit;

$Edit1 = $Edit + 1;
$Master1="master" . $Create . "." . $Edit1;

$Edit2 = $Edit1 + 1;
$Master2="master" . $Create . "." . $Edit2;

//$Master1 = "master" . $Create . "." . $Edit1;
$Current_Master="master" . $Work;

$tok1=strtok($Work, "." );
$tok2=strtok( "." );

$tok3=$tok2 + 1;
$New_Master="master" . $tok1 . "." . $tok3;


?>


