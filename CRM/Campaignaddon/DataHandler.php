<?php
/*-------------------------------------------------------+
| SYSTOPIA OnlyOffice Integration                        |
| Copyright (C) 2019 SYSTOPIA                            |
| Author: B. Zschiedrich (zschiedrich@systopia.de)       |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+-------------------------------------------------------*/

class CRM_Campaignaddon_DataHandler {

  private $dataProviders = [];

  function __construct() {
    $providerList = [
      new CRM_Campaignaddon_Data_SupporterCount()
    ];

    //Fill provider list as map with provider name => provider instance:
    foreach ($providerList as $provider) {
      if (!$this->hasProvider($provider->getName())) {
        $this->dataProviders[$provider->getName()] = $provider;
      }
    }
  }

  public function hasProvider($providerName) {
    return isset($this->dataProviders[$providerName]);
  }

  public function getData($providerName) {
    if ($this->hasProvider($providerName)) {
      return $this->dataProviders[$providerName]->getData();
      //TODO: Cache the result.
    }
    else {
      return NULL;
    }
  }

}