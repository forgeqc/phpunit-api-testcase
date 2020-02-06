<?php

namespace ForgeQC\ApiIntegrationTesting;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

abstract class XML_Api_TestCase extends Generic_Api_TestCase {
  public function query(String $method, String $uri, String $expectedContentType, Int $expectedResponseCode = 200): \SimpleXMLElement {
    $response = $this->http->request($method, $uri);

    $this->assertEquals($expectedResponseCode, $response->getStatusCode());

    $contentType = $response->getHeaders()["Content-Type"][0];
    $this->assertEquals("application/xml", $expectedContentType);

    $xmlDoc = new \SimpleXMLElement($response->getBody());

    foreach($xmlDoc->getDocNamespaces() as $strPrefix => $strNamespace) {
      if(strlen($strPrefix)==0) {
          $strPrefix="ns"; //Assign an arbitrary namespace prefix.
      }
      $xmlDoc->registerXPathNamespace($strPrefix,$strNamespace);
    }
    return $xmlDoc;
  }
}
