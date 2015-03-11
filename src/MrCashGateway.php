<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments MisterCash Gateway
 * @package Omnipay\Curopayments
 */
class MrCashGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Curopayments MisterCash';
    }
}
