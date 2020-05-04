<?php declare(strict_types=1);
/**
 * Copyright © 2020 MultiSafepay, Inc. All rights reserved.
 * See DISCLAIMER.md for disclaimer details.
 */

namespace MultiSafepay\Api\Transactions\RequestOrder;

use MultiSafepay\ValueObject\IbanNumber;

/**
 * Class GatewayInfoAccount
 * @package MultiSafepay\Api\Transactions\RequestOrder
 */
class GatewayInfoDirectAccount implements GatewayInfoInterface
{
    /**
     * @var IbanNumber
     */
    private $accountId;

    /**
     * @var string
     */
    private $accountHolderName;

    /**
     * @var IbanNumber
     */
    private $accountHolderIban;

    /**
     * @var string
     */
    private $emanDate;

    /**
     * GatewayInfoAccount constructor.
     * @param IbanNumber $accountId
     * @param string $accountHolderName
     * @param IbanNumber $accountHolderIban
     * @param string $emanDate
     */
    public function __construct(
        IbanNumber $accountId,
        string $accountHolderName,
        IbanNumber $accountHolderIban,
        string $emanDate
    ) {
        $this->accountId = $accountId;
        $this->accountHolderName = $accountHolderName;
        $this->accountHolderIban = $accountHolderIban;
        $this->emanDate = $emanDate;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'account_id' => $this->accountId,
            'account_holder_name' => $this->accountHolderIban,
            'account_holder_iban' => $this->accountHolderName,
            'emandate' => $this->emanDate,
        ];
    }

    /**
     * @return array
     */
    public function getCompatibleGateways(): array
    {
        return [
            'DIRDEB',
        ];
    }

    /**
     * @return array
     */
    public function getCompatibleTypes(): array
    {
        return [
            'direct'
        ];
    }
}
