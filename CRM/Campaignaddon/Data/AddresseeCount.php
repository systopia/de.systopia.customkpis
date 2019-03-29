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

class CRM_Campaignaddon_Data_AddresseeCount extends CRM_Campaignaddon_Data_BaseClass {

  protected $name = 'AddresseeCount';

  public function getData() {
    $settings = CRM_Campaignaddon_Configuration::getSettings();

    $allIdsList = implode(',', $this->allCampaignIds);
    $versandActivityTypes = implode(',', $settings['versand_activity_types']);

    $query = "
      SELECT COUNT(DISTINCT contact.contact_id)
      FROM `civicrm_activity` AS activity
      LEFT JOIN `civicrm_activity_contact` AS contact
        ON activity.id = contact.activity_id
          AND contact.record_type_id = 3
      WHERE activity.campaign_id IN ({$allIdsList})
        AND activity.activity_type_id IN ({$versandActivityTypes})
    ";
    //"civicrm_activity_contact.record_type_id = 3" means the contact is a target of the activity.

      $result = CRM_Core_DAO::singleValueQuery($query);

      if ($result) {
         return $result;
      } else {
         return '0';
      }
  }

}