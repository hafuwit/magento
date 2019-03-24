<?php
/**
 * Sample file
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

use Magento\Quote\Model\Quote\Address\RateRequest;
use Magento\Shipping\Model\Rate\Result;
/**
 * Sample class
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
class Sample extends \Magento\Shipping\Model\Carrier\AbstractCarrier
{

    protected $_code = 'hfwsample';

    protected $_rateRequest;

    public function __construct(
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Quote\Model\Quote\Address\RateResult\ErrorFactory $rateErrorFactory,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Shipping\Model\Rate\ResultFactory $rateResultFactory,
        \Magento\Quote\Model\Quote\Address\RateResult\MethodFactory $rateMethodFactory,
        array $data = []
    ) {
        $this->_rateResultFactory = $rateResultFactory;
        $this->_rateMethodFactory = $rateMethodFactory;
        parent::__construct($scopeConfig, $rateErrorFactory, $logger, $data);
    }

    public function getAllowedMethods()
    {
        return [$this->_code => 'HFW'];
    }

    public function isActive(){
        return $this->getConfigData('active');
    }

    public function getRateRequest(){
        return $this->_rateRequest;
    }

    public function collectRates(RateRequest $request)
    {
        $this->_rateRequest = $request;
        if (!$this->getConfigData('active')) {
            return false;
        }

        $result = $this->_rateResultFactory->create();

        $method = $this->_rateMethodFactory->create();

        $method->setCarrier($this->_code);
        $method->setCarrierTitle($this->getConfigData('name'));

        $method->setMethod($this->_code);
        $method->setMethodTitle($this->getConfigData('title'));

        $amount = $this->getConfigData('fixed_price');

        $method->setPrice($amount);
        $method->setCost($amount);

        $result->append($method);

        return $result;
    }
}
