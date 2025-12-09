<?php

declare(strict_types=1);

namespace MBk\ApiRestrictions\Plugin\Webapi\Controller\Rest;

use Magento\Framework\Exception\AuthorizationException;
use Magento\Framework\Webapi\Rest\Request;
use Magento\Webapi\Controller\Rest\SynchronousRequestProcessor;
use MBk\ApiRestrictions\Model\Validator;

class SynchronousRequestProcessorPlugin
{
    public function __construct(
        protected Validator $validator
    ) {}

    public function beforeProcess(
        SynchronousRequestProcessor $subject,
        Request $request
    ): array {
        if (!$this->validator->isValidIp()) {
            throw new AuthorizationException(
                __("The consumer isn't authorized to access resources.")
            );
        }

        return [$request];
    }
}
