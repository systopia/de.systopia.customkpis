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

class CRM_Campaignaddon_KPI_SupporterCount extends CRM_Campaignaddon_KPI_BaseClass {

  protected $name = 'SupporterCount';

  public function calculateKpi($dataHandler, $campaignId, $children) {

    $data = $dataHandler->getData('SupporterCount');

    $kpi = [
      "id"          => $this->name,
      "title"       => ts('Number of supporters', CRM_Campaignaddon_Configuration::DOMAIN),
      "kpi_type"    => "number",
      "vis_type"    => "none",
      "description" => ts("Number of supporters associated with this campaign", CRM_Campaignaddon_Configuration::DOMAIN),
      "value"       => $data,
      "link"        => ""
    ];

    return $kpi;
  }
}
