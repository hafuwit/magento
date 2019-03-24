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
namespace HFW\Sample\Model;
/**
 * LogApi class
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
class LogApi extends \Magento\Framework\Model\AbstractModel
{
	const CACHE_TAG = 'hfw_sample_logs_api';

	protected $_cacheTag = 'hfw_sample_logs_api';

	protected $_eventPrefix = 'hfw_sample_logs_api';

	protected function _construct()
	{
		$this->_init('HFW\Sample\Model\ResourceModel\LogApi');
	}

	public function writeRequest($data){
		return $this->getResource()->writeRequest($data);
	}

	public function writeResponse($data){
		return $this->getResource()->writeResponse($data);
	}
}
