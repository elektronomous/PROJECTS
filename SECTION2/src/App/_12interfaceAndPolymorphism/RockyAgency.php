<?php

namespace App\_12interfaceAndPolymorphism;

/* 12~ create another Debt Collector Agency called RockyAgency and implement another method  */
class RockyAgency implements DebtCollector {
    public function __construct(){}

    public function collect(float $owedAmount): float {
        return $owedAmount * 0.65;
    }

}

?>