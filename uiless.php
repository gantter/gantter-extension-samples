<?php 
/*
 * Sample Gantter Extension
 * Reads projectXML and updates title
 *
 */
	$projectXML = simplexml_load_string($_POST["projectXML"]);

	$sxe = new SimpleXMLElement($projectXML->asXML());
	$sxe->registerXPathNamespace('n', 'http://schemas.microsoft.com/project');

	$result = $sxe->xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="0"]]');

	$newtitle = "Gantter Extensions Rock";
	$result[0]->Name = $newtitle;

	header('Content-type: application/xml');
	echo $sxe->asXML();

?> 

