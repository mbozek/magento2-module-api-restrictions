<?php

declare(strict_types=1);

namespace MBk\ApiRestrictions\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Serialize\Serializer\Json;

class Config
{
    protected const XML_CONFIG_ALLOWED_IPS = 'webapi/webapisecurity/allowed_ips';

    public function __construct(
        protected Json $serializer,
        protected ScopeConfigInterface $scopeConfig
    ) {}

    public function getAllowedIPs(): array
    {
        $values = $this->scopeConfig->getValue(self::XML_CONFIG_ALLOWED_IPS);

        if (empty($values)) {
            return [];
        }

        $result = [];

        foreach ($this->serializer->unserialize($values) as $ip) {
            $result[] = $ip['ip_address'];
        }

        return $result;
    }
}
