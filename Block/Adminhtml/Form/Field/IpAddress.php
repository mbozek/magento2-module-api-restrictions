<?php

declare(strict_types=1);

namespace MBk\ApiRestrictions\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

class IpAddress extends AbstractFieldArray
{
    protected function _prepareToRender()
    {
        $this->addColumn(
            'ip_address',
            [
                'label' => __('IP Address'),
                'class' => 'required-entry ipv4',
            ]
        );

        $this->addColumn(
            'description',
            [
                'label' => __('Description'),
                'class' => 'admin__control-text'
            ]
        );

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add IP Address');
    }
}
