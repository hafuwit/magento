<?php
/**
 * Index file
 * php version 7.1.27
 * Magento version 2.2.6
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
namespace HFW\Sample\Controller\Adminhtml\Config;
/**
 * Index class
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
class Index extends \HFW\Sample\Controller\Adminhtml\AbstractController
{
    /**
     * Index execute
     *
     * @return null
     */
    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
