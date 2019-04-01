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

class CRM_Campaignaddon_KPI_VersandCount extends CRM_Campaignaddon_KPI_BaseClass {

  protected $name = 'VersandCount';

  public function calculateKpi($dataHandler) {
    $data = $dataHandler->getData('VersandCount');

    $kpi = [
      "id"          => $this->name,
      "title"       => ts('Auflage', CRM_Campaignaddon_Configuration::DOMAIN),
      "kpi_type"    => "number",
      "vis_type"    => "none",
      "description" => ts("Auflage (number of activities with types defined in versand activity list) associated with this campaign", CRM_Campaignaddon_Configuration::DOMAIN),
      "value"       => $data,
      "link"        => ""
    ];

    return $kpi;
  }
}
