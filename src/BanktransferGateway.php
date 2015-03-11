<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments Banktransfer Gateway
 * @package Omnipay\Curopayments
 */
class BanktransferGateway extends AbstractGateway
{
    /**
     * @return string
     */
    public function getName()
    {
        return 'Curopayments Banktransfer';
    }
}
