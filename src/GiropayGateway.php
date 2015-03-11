<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments Giropay Gateway
 * @package Omnipay\Curopayments
 */
class GiropayGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Curopayments Giropay';
    }
}
