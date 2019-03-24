<?php
/**
 * AbstractController file
 * php version 7.1.27
 * Magento version 2.2.6
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
namespace HFW\Sample\Controller\Adminhtml;
/**
 * AbstractController class
 * 
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
abstract class AbstractController extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

    protected $_authSession;

    protected $_url;

    const HFW_SAMPLE_RESOURCE = "HFW_Sample::sample";

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        \Magento\Framework\UrlInterface $url,
        \Magento\Backend\Model\Auth\Session $authSession
	){
		$this->_authSession = $authSession;
        $this->_pageFactory = $pageFactory;
        $this->_url = $url;
        parent::__construct($context);

        if(!$this->_authSession->isAllowed(static::HFW_SAMPLE_RESOURCE)){
            header('Location: '.$this->_url->getUrl('admin/index/index'));
            exit();
        }
    }
}
