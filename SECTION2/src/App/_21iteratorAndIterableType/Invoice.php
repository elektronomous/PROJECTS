<?php

namespace App\_21iteratorAndIterableType;

/* 
    2~ create Invoice class on this directory
*/
class Invoice { 
    public int $id;
    private int $priv_id;

    public function __construct(public float $amount)
    {
        $this->id = random_int(10000,99999);
    }
}
/* 
    3# test this class 
*/

function random_int(int $start, int $end): int {
    return rand($start, $end);
}

?>