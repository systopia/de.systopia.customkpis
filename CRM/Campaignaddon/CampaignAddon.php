<?php
/*-------------------------------------------------------+
| SYSTOPIA OnlyOffice Integration                        |
| Copyright (C) 2018 SYSTOPIA                            |
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

use CRM_Campaignaddon_ExtensionUtil as E;

/**
 * General handling class
 */
class CRM_Campaignaddon_CampaignAddon {

  private static $singleton = NULL;

  /**
  * Get the CampaignAddon controller singleton
  */
  public static function getSingleton() {
    if (self::$singleton === NULL) {
      self::$singleton = new CRM_Campaignaddon_CampaignAddon();
    }
    return self::$singleton;
  }

  /**
   * CRM_Campaignaddon_CampaignAddon constructor.
   */
  function __construct() {
    $settings = CRM_Campaignaddon_Configuration::getSettings();
  }
}
