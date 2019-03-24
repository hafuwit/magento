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
namespace HFW\Sample\Model\ResourceModel;
/**
 * Account class
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
class Account extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Account __construct
     * collect registration data
     *
     * @param string $context //The Context
     *
     * @return null
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Account _construct
     *
     * @return array $data
     */
    protected function _construct()
    {
        $this->_init('hfw_sample_account', 'account_id');
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
        $this->getConnection()->insert($this->getMainTable(), $data);
    }

    /**
     * Account getListAccount
     *
     * @return array $data
     */
    public function getListAccount()
    {
        $select = $this->getConnection()->select()->from($this->getMainTable());
        $accounts = [];
        $query = $this->getConnection()->query($select);
        while ($row = $query->fetch()) {
            $accounts[] = $row;
        }
        return $accounts;
    }

    /**
     * Account getAccountDefault
     *
     * @return array $data
     */
    public function getAccountDefault()
    {
        $select = $this->getConnection()->select()
            ->from($this->getMainTable())
            ->where('account_default = ?', '1');
        return $this->getConnection()->fetchRow($select);
    }

    /**
     * Account deleteAccount
     *
     * @param string $accountId //The accountId
     *
     * @return array $data
     */
    public function deleteAccount($accountId)
    {
        $arrayWhere = ['account_id =?' => $accountId, 'account_default =?' => 0];
        return $this->getConnection()->delete($this->getMainTable(), $arrayWhere);
    }

    /**
     * Account checkAccount
     *
     * @param string $hfw_account_number //The hfw_account_number
     *
     * @return array $data
     */
    public function checkAccount($hfw_account_number)
    {
        $select = $this->getConnection()->select()
            ->from($this->getMainTable())
            ->where('hfw_account_number = ?', $hfw_account_number);
        return $this->getConnection()->fetchRow($select);
    }

    /**
     * Account getInfoAccount
     *
     * @param string $id //The id
     *
     * @return array $data
     */
    public function getInfoAccount($id)
    {
        $select = $this->getConnection()->select()
            ->from($this->getMainTable())
            ->where('account_id = ?', $id);
        return $this->getConnection()->fetchRow($select);
    }
}
