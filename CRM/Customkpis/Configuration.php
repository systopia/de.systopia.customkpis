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

class CRM_Customkpis_Configuration {

  const GROUP = 'de.systopia.customkpis';
  const PREFIX = 'customkpis';
  const SETTINGS = self::PREFIX . '_settings';

  public const DOMAIN = ['domain' => self::GROUP];
  // TODO: Change these constants with the ones in CRM_Customkpis_ExtensionUtil (customkpis.civix.php).

  public static function getDefaultConfiguration()
  {
    return [
      'versand_activity_types' => [2,3,4,19,22,34],
      'include_deleted_contacts' => true,
      // TODO: Add configuration for KPIs so one can enable or disable them.
    ];
  }

  /**
   * @param $name string settings name
   */
  public static function getSetting($name)
  {
    $settings = self::getSettings();
    return CRM_Utils_Array::value($name, $settings, NULL);
  }

  /**
   * @return array settings
   */
  public static function getSettings()
  {
    $settings = CRM_Core_BAO_Setting::getItem(self::GROUP, self::SETTINGS);
    if ($settings && is_array($settings)) {
      return $settings;
    } else {
      return self::getDefaultConfiguration();
    }
  }

  /**
   * Stores settings
   *
   * @return array settings
   */
  public static function setSettings($settings)
  {
    CRM_Core_BAO_Setting::setItem($settings, self::GROUP, self::SETTINGS);
  }
}
