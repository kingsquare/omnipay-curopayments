<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments Paypal Gateway
 * @package Omnipay\Curopayments
 */
class PaypalGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Curopayments Paypal';
    }
}
