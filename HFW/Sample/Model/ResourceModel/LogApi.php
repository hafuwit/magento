<?php
/**
 * LogApi file
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
 * LogApi class
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
class LogApi extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}

	protected function _construct()
	{
		$this->_init('hfw_sample_logs_api', 'id');
	}

	
	public function writeRequest($data){
		$this->getConnection()->insert($this->getMainTable(), $data);
		return $this->getConnection()->lastInsertId();
	}

	public function writeResponse($data){
		return $this->getConnection()->update($this->getMainTable(), $data, ['id =?'=>$data['id']]);
	}
	

}
