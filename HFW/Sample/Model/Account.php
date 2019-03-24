<?php
/**
 * Account file
 * php version 7.1.27
 * Magento version 2.2.6
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
namespace HFW\Sample\Model;
/**
 * Account class
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
class Account extends \Magento\Framework\Model\AbstractModel
{
    const CACHE_TAG = \HFW\Sample\Helper\Config::HFW_SAMPLE_ACCOUNT;
    protected $cacheTag = \HFW\Sample\Helper\Config::HFW_SAMPLE_ACCOUNT;
    protected $eventPrefix = \HFW\Sample\Helper\Config::HFW_SAMPLE_ACCOUNT;

    /**
     * Account _construct
     *
     * @return null
     */
    protected function _construct()
    {
        $this->_init('HFW\Sample\Model\ResourceModel\Account');
    }

    /**
     * Account saveAccount
     *
     * @param string $data //The data
     *
     * @return array $data
     */
    public function saveAccount($data)
    {
        $this->getResource()->saveAccount($data);
    }

    /**
     * Account getListAccount
     *
     * @return array $data
     */
    public function getListAccount()
    {
        return $this->getResource()->getListAccount();
    }

    /**
     * Account updateSelectedService
     *
     * @return array $data
     */
    public function getAccountDefault()
    {
        return $this->getResource()->getAccountDefault();
    }

    /**
     * Account updateSelectedService
     *
     * @param string $accountId //The accountId
     *
     * @return array $data
     */
    public function deleteAccount($accountId)
    {
        return $this->getResource()->deleteAccount($accountId);
    }

    /**
     * Account updateSelectedService
     *
     * @param string $hfw_account_number //The hfw_account_number
     *
     * @return array $data
     */
    public function checkAccount($hfw_account_number)
    {
        return $this->getResource()->checkAccount($hfw_account_number);
    }

    /**
     * Account updateSelectedService
     *
     * @param string $id //The id
     *
     * @return array $data
     */
    public function getInfoAccount($id)
    {
        return $this->getResource()->getInfoAccount($id);
    }
}
