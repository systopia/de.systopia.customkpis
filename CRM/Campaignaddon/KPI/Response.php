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

class CRM_Campaignaddon_KPI_Response extends CRM_Campaignaddon_KPI_BaseClass {

  protected $name = 'Response';

  public function calculateKpi($dataHandler) {
    $versandCount = $dataHandler->getData('VersandCount');
    $contributionCount = $dataHandler->getData('ContributionCount');

    if ($versandCount) {
      $response = $contributionCount / $versandCount;
    }
    else {
      $response = 0;
    }

    $kpi = [
      'id'          => $this->name,
      'title'       => ts('Response', CRM_Campaignaddon_Configuration::DOMAIN),
      'kpi_type'    => 'percentage',
      'vis_type'    => 'none',
      'description' => ts('Response (contributions per versand acitivites in percent) for this campaign.', CRM_Campaignaddon_Configuration::DOMAIN),
      'value'       => $response,
      'link'        => ''
    ];

    return $kpi;
  }
}
