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

class CRM_Customkpis_Data_Contributions extends CRM_Customkpis_Data_BaseClass {

  protected $providerNames = ['ContributionSum', 'ContributionCount', 'SupporterCount'];

  public function getData() {
    $allIdsList = implode(',', $this->allCampaignIds);

    $this->createTrashLookup('c.contact_id');

    $query = "
      SELECT
        SUM(c.total_amount) AS ContributionSum,
        COUNT(c.id) AS ContributionCount,
        COUNT(DISTINCT c.contact_id) AS SupporterCount
      FROM
        civicrm_contribution AS c
      " . $this->trashLookup['join'] . "
      WHERE
        c.campaign_id IN ({$allIdsList})
        " . $this->trashLookup['where_and'] . "
      ;
    ";

    return $this->getProviderResults($query);
  }
}