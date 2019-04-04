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

class CRM_Campaignaddon_Data_Contributions extends CRM_Campaignaddon_Data_BaseClass {

  protected $providerNames = ['ContributionSum', 'ContributionCount', 'SupporterCount'];

  public function getData() {
    $allIdsList = implode(',', $this->allCampaignIds);

    $query = "
      SELECT SUM(`total_amount`) AS ContributionSum,
             COUNT(`id`) AS ContributionCount,
             COUNT(DISTINCT `contact_id`) AS SupporterCount
      FROM `civicrm_contribution`
      WHERE `campaign_id` IN ({$allIdsList});
    ";

    return $this->getProviderResults($query);
  }
}