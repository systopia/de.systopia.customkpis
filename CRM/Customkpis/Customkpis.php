<?php
/*-------------------------------------------------------+
| SYSTOPIA Campaign Manager Addon                        |
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

use CRM_Customkpis_ExtensionUtil as E;

/**
 * General handling class
 */
class CRM_Customkpis_Customkpis {

  private static $singleton = NULL;

  private $settings = NULL;
  private $dataHandler;
  private $kpiHandler;

  /**
  * Get the Customkpis controller singleton
  */
  public static function getSingleton() {
    if (self::$singleton === NULL) {
      self::$singleton = new CRM_Customkpis_Customkpis();
    }
    return self::$singleton;
  }

  /**
   * CRM_Customkpis_Customkpis constructor.
   */
  function __construct() {
    $this->settings = CRM_Customkpis_Configuration::getSettings();

    $this->dataHandler = new CRM_Customkpis_DataHandler();

    $this->kpiHandler = new CRM_Customkpis_KpiHandler();
    $this->kpiHandler->setDataHandler($this->dataHandler);
  }

  /**
   * Runs the KPIs for this addon.
   * @param $campaignId
   * @param $kpiList
   * @param $level
   */
  function startKpis($campaignId, &$kpiList, $level) {
    $this->kpiHandler->calculateKpis($campaignId, $kpiList, $level);
  }
}
