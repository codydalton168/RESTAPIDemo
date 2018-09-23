<?php 
require_once("SimpleRest.php");
require_once("SiteData.php");

class ResHandler extends SimpleRest {

	function getAllSites() {	

		$site = new Site();
		$rawData = $site->getAllSite();

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No sites found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}
	
	function encodeHtml($responseData) {
	
		$htmlResponse = "<table border='1'>";


		foreach($responseData as $key=>$value) {
    			$htmlResponse .= "<tr><td>". $key. "</td>";
			$htmlResponse .= "<td>". $value. "</td>";
			$htmlResponse .= "</tr>";
		}



		$htmlResponse .= "</table>";


		return $htmlResponse;		
	}
	
	function encodeJson($responseData) {
		$jsonResponse = json_encode($responseData);
		return $jsonResponse;		
	}
	
	function encodeXml($responseData) {
		$xml = new SimpleXMLElement('<?'.'xml version="1.0"'.'?'.'><site></site>');
		foreach($responseData as $key=>$value) {
			$xml->addChild($key, $value);
		}
		return $xml->asXML();
	}
	
	function getSite($id) {

		$site = new Site();
		$rawData = $site->getSite($id);

		if(empty($rawData)) {
			$statusCode = 404;
			$rawData = array('error' => 'No sites found!');		
		} else {
			$statusCode = 200;
		}

		$requestContentType = $_SERVER['HTTP_ACCEPT'];
		$this ->setHttpHeaders($requestContentType, $statusCode);
				
		if(strpos($requestContentType,'application/json') !== false){
			$response = $this->encodeJson($rawData);
			echo $response;
		} else if(strpos($requestContentType,'text/html') !== false){
			$response = $this->encodeHtml($rawData);
			echo $response;
		} else if(strpos($requestContentType,'application/xml') !== false){
			$response = $this->encodeXml($rawData);
			echo $response;
		}
	}
}
?>