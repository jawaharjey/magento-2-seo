<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Betzal\Seo\Helper;

use Magento\Framework\App\Helper\Context;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var \Magento\MediaStorage\Helper\File\Storage\Database
     */
    protected $_fileStorageHelper;

    public function __construct(Context $context,
                                \Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->_storeManager = $storeManager;
        parent::__construct($context);
    }

    public function getStoreName()
    {
        $storeName = $this->scopeConfig->getValue(
            'betzal_seo/store_information/name',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        $logoAlt = $this->scopeConfig->getValue(
            'design/header/logo_alt',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        return $storeName?$storeName:$logoAlt;
    }

    public function getPostalAddress()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/store_information/name',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getTelephone()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/store_information/phone',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getStreetAddress()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/store_information/street_line1',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getAddressLocality()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/store_information/street_line2',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getAddressCity()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/store_information/city',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getPostalCode()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/store_information/postcode',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getAddressCountry()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/store_information/country_id',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function closesAt()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/store_information/hour_closes',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function opensAt()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/store_information/hour_opens',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }


    public function getLatitude()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/geo/latitude',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getLongitude()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/geo/longitude',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getWebsiteType()
    {
        return $this->scopeConfig->getValue(
            'betzal_seo/seo/website_type',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getBaseUrl()
    {
        return $this->_storeManager->getStore()->getBaseUrl();
    }

    public function getCurrentUrl()
    {
        return $this->_urlBuilder->getCurrentUrl();
    }

    public function getLogoUrl()
    {
        $folderName = \Magento\Config\Model\Config\Backend\Image\Logo::UPLOAD_DIR;
        $storeLogoPath = $this->scopeConfig->getValue(
            'design/header/logo_src',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        $path = $folderName . '/' . $storeLogoPath;
        $logoUrl = $this->_urlBuilder
                ->getBaseUrl(['_type' => \Magento\Framework\UrlInterface::URL_TYPE_MEDIA]) . $path;

        if ($storeLogoPath !== null) {
            $url = $logoUrl;
        } else {
            $url = '';
        }
        return $url;
    }

    public function getSearchUrl()
    {
        $searchUrl = $this->_urlBuilder->getUrl('catalogsearch/result/') . '?q={search_term_string}';
        return $searchUrl;
    }
}
