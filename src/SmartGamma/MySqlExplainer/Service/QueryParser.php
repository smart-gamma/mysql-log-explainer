<?php

namespace SmartGamma\MySqlExplainer\Service;

class QueryParser
{
    /**
     * @return array
     */
    public function parseQueries()
    {
        $queries = ['SELECT b0_.id AS id_0, b0_.charge_bee_id AS charge_bee_id_1, b0_.name AS name_2, b0_.description AS description_3, b0_.price AS price_4, b0_.active AS active_5, b0_.currency_code AS currency_code_6, b0_.charge_interval AS charge_interval_7, b0_.charge_interval_unit AS charge_interval_unit_8, b0_.trial_interval AS trial_interval_9, b0_.trial_interval_unit AS trial_interval_unit_10, b0_.setup_fee AS setup_fee_11, b0_.meta_data AS meta_data_12, b0_.has_trial AS has_trial_13 FROM billing_plan b0_ WHERE b0_.active = 1 AND b0_.has_trial = 1'];

        return $queries;
    }
}
