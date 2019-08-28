<?php

namespace Antt\Test\Helper;
//đê lấy giá tri từ các group configuration

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    public function getConfig($configPath,$storeId=null )
    {
        return $this->scopeConfig->getValue(
            $configPath, ScopeInterface::SCOPE_STORE,$storeId
        );
    }
}