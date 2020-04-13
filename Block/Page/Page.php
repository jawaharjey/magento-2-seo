<?php
/**
 * Copyright © 2020 Betzal. All Rights Reserved..
 * Author: Jawahar Jeyaraman (jeyaraman.jawahar@gmail.com)
 */
namespace Betzal\Seo\Block\Page;

use Magento\Framework\View\Element\Template;

/**
 * Cms page content block
 *
 * @api
 * @since 100.0.2
 */
class Page extends \Magento\Framework\View\Element\Template
{
    protected $_pageTitle;

    public function __construct(Template\Context $context,
                                \Magento\Framework\View\Page\Title $title,
                                array $data = [])
    {
        $this->_pageTitle = $title;
        parent::__construct($context, $data);
    }

    public function getTitle()
    {
        return $this->_pageTitle->getShort();
    }
}
