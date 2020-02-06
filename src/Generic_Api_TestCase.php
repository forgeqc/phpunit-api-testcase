<?php

namespace ForgeQC\ApiIntegrationTesting;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

abstract class Generic_Api_TestCase extends TestCase {
  protected $http;

  final public function setUp(): void {
    $this->http = new \GuzzleHttp\Client(['base_uri' => getenv('BASE_URL')]);
  }

  final public function tearDown(): void {
    $this->http = null;
  }
}
