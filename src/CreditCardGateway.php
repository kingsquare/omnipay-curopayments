<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments Credit Card Gateway
 * @package Omnipay\Curopayments
 */
class CreditCardGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Curopayments Credit Card';
    }
}
