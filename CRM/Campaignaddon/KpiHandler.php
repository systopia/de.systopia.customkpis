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

require_once('CRM/CampaignTree/Tree.php');

class CRM_Campaignaddon_KpiHandler {

  private $kpiProviders;
  private $dataHandler;

  function __construct() {
    $this->kpiProviders = [
      //new CRM_Campaignaddon_KPI_AddresseeCount(),
      new CRM_Campaignaddon_KPI_VersandCount(),
      new CRM_Campaignaddon_KPI_SupporterCount(),
      new CRM_Campaignaddon_KPI_AverageSupporterContribution(),
      new CRM_Campaignaddon_KPI_Response,
    ];
  }

  public function setDataHandler($dataHandler) {
    $this->dataHandler = $dataHandler;
  }

  public function calculateKpis($campaignId, &$kpiList, $level) {
    // get all sub-campaigns
    $campaigns = CRM_Campaign_Tree::getCampaignIds($campaignId, $level);
    $children = $campaigns['children'];

    $this->dataHandler->setCampaign($campaignId, $children);

    foreach ($this->kpiProviders as $provider) {
      $name = $provider->getName();
      $kpi = $provider->calculateKpi($this->dataHandler);
      $kpiList[$name] = $kpi;
    }
  }

}