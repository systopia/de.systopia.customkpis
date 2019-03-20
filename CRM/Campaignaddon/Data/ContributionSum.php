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

class CRM_Campaignaddon_Data_ContributionSum extends CRM_Campaignaddon_Data_BaseClass {

  protected $name = 'ContributionSum';

  public function getData() {
    $allIdsList = implode(',', $this->allCampaignIds);

    $query = "
      SELECT SUM(`total_amount`)
      FROM `civicrm_contribution`
      WHERE `campaign_id` IN ({$allIdsList});
    ";

      $result = CRM_Core_DAO::singleValueQuery($query);

      if ($result) {
         return $result;
      } else {
         return '0';
      }
  }

}