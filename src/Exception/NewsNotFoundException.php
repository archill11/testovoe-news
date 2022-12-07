<?php

namespace App\Exception;

use RuntimeException;

class NewsNotFoundException extends RuntimeException {

  public function __construct() {
    parent::__construct("news not found");
  }
}