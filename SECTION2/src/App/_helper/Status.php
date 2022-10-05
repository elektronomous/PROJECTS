<?php

namespace App\_helper;

class Status {
    /* 
        17~ move all the properties on the App\_7constantProperties\Transaction to this class
    */
    public const PAID = 'paid';
    public const PENDING = 'pending';
    public const DECLINED = 'declined';
    private const PRIV_PAID = 'private paid';

    public const ALL_STATUS = [
        self::PAID => 'Paid',
        self::PENDING => 'Pending',
        self::DECLINED => 'Declined'
    ];


}