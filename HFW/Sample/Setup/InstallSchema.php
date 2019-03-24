<?php
/**
 * InstallSchema file
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

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * InstallSchema class
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
class InstallSchema implements InstallSchemaInterface
{

	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();

		//create table hafuwit_config when install module.
		if (!$installer->tableExists('hfw_sample_config')) {
			$table = $installer->getConnection()->newTable($installer->getTable('hfw_sample_config'))
			->addColumn( 'id', Table::TYPE_INTEGER, null, ['identity' => true, 'nullable' => false, 'primary'  => true, 'unsigned' => true ], 'Config ID' )
			->addColumn( 'name', Table::TYPE_TEXT, 255, ['nullable => false'], 'Config Name' )
			->addColumn( 'value', Table::TYPE_FLOAT, 11, [], 'Config Value' );
			$installer->getConnection()->createTable($table);
		}

		if (!$installer->tableExists('hfw_sample_account')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('hfw_sample_account')
			)
			->addColumn( 'account_id', Table::TYPE_INTEGER, null, [ 'identity' => true, 'nullable' => false, 'primary'  => true, 'unsigned' => true ], 'Account ID' )
			->addColumn( 'title', Table::TYPE_TEXT, 10, ['nullable => true'], 'Title' )
			->addColumn( 'fullname', Table::TYPE_TEXT, 100, ['nullable => true'], 'Fullname' )
			->addColumn( 'company', Table::TYPE_TEXT, 255, ['nullable => true'], 'Company' )
			->addColumn( 'email', Table::TYPE_TEXT, 100, ['nullable => true'], 'Email' )
			->addColumn( 'phone_number', Table::TYPE_TEXT, 100, ['nullable => true'], 'Phone Number' )
			->addColumn( 'address_type', Table::TYPE_TEXT, 255, ['nullable => true'], 'Address Type' )
			->addColumn( 'address_1', Table::TYPE_TEXT, 255, ['nullable => true'], 'Address_1' )
			->addColumn( 'address_2', Table::TYPE_TEXT, 255, ['nullable => true'], 'Address_2' )
			->addColumn( 'address_3', Table::TYPE_TEXT, 255, ['nullable => true'], 'Address_3' )
			->addColumn( 'post_code', Table::TYPE_TEXT, 50, ['nullable => true'], 'Post code' )
			->addColumn( 'city', Table::TYPE_TEXT, 255, ['nullable => true'], 'City' )
			->addColumn( 'country', Table::TYPE_TEXT, 10, ['nullable => true'], 'Country' )
			->addColumn( 'account_type', Table::TYPE_INTEGER, 10, ['nullable => true'], 'Account Type(0,1,2)' )
			->addColumn( 'hfw_account_name', Table::TYPE_TEXT, 255, ['nullable => true'], 'Hafuwit account name' )
			->addColumn( 'hfw_account_number', Table::TYPE_TEXT, 255, ['nullable => true'], 'Hafuwit Account Number' )
			->addColumn( 'hfw_invoice_number', Table::TYPE_TEXT, 255, ['nullable => true'], 'Hafuwit Invoice Number' )
			->addColumn( 'hfw_account_account', Table::TYPE_TEXT, 255, ['nullable => true'], 'Hafuwit Invoice Amount' )
			->addColumn( 'hfw_currency', Table::TYPE_TEXT, 255, ['nullable => true'], 'Hafuwit Currency' )
			->addColumn( 'hfw_invoice_date', Table::TYPE_DATETIME, 255, ['nullable => true'], 'Hafuwit Invoice Date' )
			->addColumn( 'account_default', Table::TYPE_INTEGER, 255, ['nullable => true'], 'Account Default' );
			$installer->getConnection()->createTable($table);
		}

		if (!$installer->tableExists('hfw_sample_logs_api')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('hfw_sample_logs_api')
			)
			->addColumn( 'id', Table::TYPE_INTEGER, null, ['identity' => true, 'nullable' => false, 'primary'  => true, 'unsigned' => true ], 'ID' )
			->addColumn( 'method', Table::TYPE_TEXT, '255', ['nullable => true'], 'Method' )
			->addColumn( 'full_uri', Table::TYPE_TEXT, '255', ['nullable => true'], 'URI' )
			->addColumn( 'request', Table::TYPE_TEXT, '', ['nullable => true'], 'Request' )
			->addColumn( 'response', Table::TYPE_TEXT, '', ['nullable => true'], 'Response' )
			->addColumn( 'time_request', Table::TYPE_DATETIME, '', [], 'Time request' )
			->addColumn( 'time_response', Table::TYPE_DATETIME, '', [], 'Time response' );
			$installer->getConnection()->createTable($table);
		}

		$installer->endSetup();
	}
}

