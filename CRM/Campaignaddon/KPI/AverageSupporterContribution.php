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

class CRM_Campaignaddon_KPI_AverageSupporterContribution extends CRM_Campaignaddon_KPI_BaseClass {

  protected $name = 'AverageSupporterContribution';

  public function calculateKpi($dataHandler) {
    $contributionSum = $dataHandler->getData('ContributionSum');
    $supporterCount = $dataHandler->getData('SupporterCount');

    if ($supporterCount) {
      $data = $contributionSum / $supporterCount;
    }
    else {
      $data = 0;
    }

    $kpi = [
      "id"          => $this->name,
      "title"       => ts('Average contribution per supporter', CRM_Campaignaddon_Configuration::DOMAIN),
      "kpi_type"    => "money",
      "vis_type"    => "none",
      "description" => ts("Average donation amount per supporter for this campaign", CRM_Campaignaddon_Configuration::DOMAIN),
      "value"       => $data,
      "link"        => ""
    ];

    return $kpi;
  }
}
