<?php

declare(strict_types=1);

namespace MBk\ApiRestrictions\Model;

use Magento\Framework\HTTP\PhpEnvironment\RemoteAddress;

class Validator
{
    public function __construct(
        protected Config $config,
        protected RemoteAddress $remoteAddress
    ) {}

    public function isValidIp(): bool
    {
        $allowedIPs = $this->config->getAllowedIPs();
        $remoteIp = $this->remoteAddress->getRemoteAddress();

        if (!empty($allowedIPs) && !empty($remoteIp)) {
            if (!in_array($remoteIp, $allowedIPs)) {
                return false;
            }
        }

        return true;
    }
}
