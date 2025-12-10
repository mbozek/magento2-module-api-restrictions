# Magento 2 API restrictions module

Magento 2 module to restrict api requests.

## Requirements

- Magento 2.4.7
- PHP 8.2

## Installation

```bash
# Install via composer
composer require mbozek/magento2-module-api-restrictions

# Enable the module
bin/magento module:enable MBk_ApiRestrictions

# Run setup upgrade
bin/magento setup:upgrade

# Flush cache
bin/magento cache:flush
```

## Usage

Configure IPs with allowed access to API.
