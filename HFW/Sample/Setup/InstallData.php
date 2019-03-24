<?php
/**
 * InstallData file
 * php version 7.1.27
 * Magento version 2.2.6
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
namespace HFW\Sample\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
/**
 * InstallData class
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
class InstallData implements InstallDataInterface
{

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
		//insert new data to db when install module.
        $dataConfigs = [
            [ 'scope' => 'default', 'scope_id' => 0, 'path' => \HFW\Sample\Helper\Config::HAFUWIT_SAMPLE_ACCOUNT, 'value' => '1' ],
            [ 'scope' => 'default', 'scope_id' => 0, 'path' => \HFW\Sample\Helper\Config::HAFUWIT_SAMPLE_INFO, 'value' => '1' ]
        ];
        foreach($dataConfigs as $data){
            $setup->getConnection()->insertOnDuplicate($setup->getTable('core_config_data'), $data);
        }
    }
}
