<?php 
/*
 * Sample Gantter Extension
 * Reads post variables and displays values
 */
	$projectXML = simplexml_load_string($_POST["projectXML"]);

	$sxe = new SimpleXMLElement($projectXML->asXML());
	$sxe->registerXPathNamespace('n', 'http://schemas.microsoft.com/project');

	$result = $sxe->xpath('/n:Project/n:Tasks/n:Task[n:UID[text()="0"]]');

	$title = $result[0]->Name;

	header('Content-type: text/html');

?> 
<html>
	<head>
		<title>Gantter UI Extension Example</title>
	</head>
	
	<body>
		<h1>Gantter UI Extension Example</h1>
		
		Your email address is: <b><?php echo $_POST["email"] ?></b> <br/>
		You were working in the <b><?php echo $_POST["currentWorkspace"] ?> workspace</b> <br/>
		The project title is: <b><?php echo $title ?></b> <br/>
		These rows were selected: <b><?php echo $_POST["selectedItems"] ?></b> <br/>
	
	</body>
</html>
