<?php include("FusionCharts.php");
?>
<?php
function createBarChart( $name, $count, $size )
{
	$colors = array( 'AFD8F8', 'F6BD0F', '8BBA00', 'FF8E46', '008E8E', 'D64646', '8E468E', '588526', 'B3AA00', '008ED6', '9D080D', 'A186BE' );
        $colorCount = 12;
	//Create an XML data document in a string variable
	$strXML = "<graph caption='Users' xAxisName='User' yAxisName='Count' decimalPrecision='0' formatNumberScale='0'>";
        $i = 0;
        $j = 0;
	for( $i = 0; $i < $size; $i++ )
	{
		$strXML .= "<set name='";
		$strXML .= $name[ $i ];
		$strXML .= "' value='";
		$strXML .= $count[ $i ];
		$strXML .= "' color='";
		$strXML .= $colors[ $j ];
		$strXML .= "' />";

		if( $j < $colorCount )
			$j++;
		else
			$j = 0;
	}
	//$strXML .= "<set name='Jan' value='462' color='AFD8F8' />";
	//$strXML .= "<set name='Feb' value='857' color='F6BD0F' />";
	//$strXML .= "<set name='Mar' value='671' color='8BBA00' />";
	//$strXML .= "<set name='Apr' value='494' color='FF8E46'/>";
	//$strXML .= "<set name='May' value='761' color='008E8E'/>";
	//$strXML .= "<set name='Jun' value='960' color='D64646'/>";
	//$strXML .= "<set name='Jul' value='629' color='8E468E'/>";
	//$strXML .= "<set name='Aug' value='622' color='588526'/>";
	//$strXML .= "<set name='Sep' value='376' color='B3AA00'/>";
	//$strXML .= "<set name='Oct' value='494' color='008ED6'/>";
	//$strXML .= "<set name='Nov' value='761' color='9D080D'/>";
	//$strXML .= "<set name='Dec' value='960' color='A186BE'/>";
	$strXML .=  "</graph>";
	
	//echo $strXML;
	
	
	//Create the chart - Column 3D Chart with data from strXML variable using dataXML method
	echo renderChartHTML("FCF_Column3D.swf", "", $strXML, "myNext", 400, 200);
	//echo renderChartHTML("FCF_Pie3D.swf", "", $strXML, "myNext", 700, 200);
}
?>

