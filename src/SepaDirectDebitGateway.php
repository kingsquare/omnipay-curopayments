<?php

namespace Omnipay\Curopayments;

/**
 * Curopayments Sepa Direct Debit Gateway
 */
class SepaDirectDebitGateway extends AbstractGateway
{
	public function getName()
	{
		return 'Curopayments SEPA Direct Debit';
	}
}
