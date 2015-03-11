<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments Sofort Banking Gateway
 * @package Omnipay\Curopayments
 */
class SofortBankingGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Curopayments Sofort Banking';
    }
}
