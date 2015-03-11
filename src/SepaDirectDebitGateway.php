<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments Sepa Direct Debit Gateway
 * @package Omnipay\Curopayments
 */
class SepaDirectDebitGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Curopayments SEPA Direct Debit';
    }
}
