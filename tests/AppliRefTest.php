<?php

namespace Tests\ForgeQC\ApiIntegrationTesting;

use ForgeQC\ApiIntegrationTesting\XML_Api_TestCase;

class AppliRefTest extends XML_Api_TestCase {
  public function testGet() {
    $xml = $this->query('GET', '/pkp/ojs/master/plugins/importexport/users/sample.xml', 'application/xml');
    var_dump($xml->xpath("/ns:PKPUsers/ns:user_groups/ns:user_group/ns:name")[0]);
  }
}
