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

class CRM_Customkpis_KPI_SupporterCount extends CRM_Customkpis_KPI_BaseClass {

  protected $name = 'SupporterCount';

  public function calculateKpi($dataHandler) {
    $data = $dataHandler->getData('SupporterCount');

    $kpi = [
      "id"          => $this->name,
      "title"       => ts('Number of supporters', CRM_Customkpis_Configuration::DOMAIN),
      "kpi_type"    => "number",
      "vis_type"    => "none",
      "description" => ts("Number of supporters (contacts who contributed) in this campaign", CRM_Customkpis_Configuration::DOMAIN),
      "value"       => $data,
      "link"        => ""
    ];

    return $kpi;
  }
}
