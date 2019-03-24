<?php
/**
 * Config file
 * php version 7.1.27
 * Magento version 2.2.6
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
namespace HFW\Sample\Helper;
/**
 * Config class
 *
 * @category HFW_Sample
 * @package  HFW_Sample
 * @author   Hafuwit <hafuwit@gmail.com>
 * @license  New BSD License
 * @link     https://www.hafuwit.com
 */
class Config
{
	const HAFUWIT_SAMPLE_ACCOUNT = "carriers/hfwsample/account";
    const HAFUWIT_SAMPLE_INFO = "carriers/hfwsample/info";

    const REGEX_VALIDATE = [
        'alphanum' => '/^[a-zA-Z0-9]*$/',
        'alpha' => '/^[a-zA-Z]*$/',
        'number' => '/^\s*-?\d*(\.\d*)?\s*$/',
        'numberInt' => '/^\d+$/',
        'numberFloat' => '/^\d+(\.\d{1,2})?$/',
        'email' => '/[a-z0-9._%+-]+@[a-z0-9]+\.[a-z]{2,3}$/',
        'phone' => '/[0|\+][0-9]+/',
        'postalCode' => '/[0-9]{2}[\-][0-9]{3}/',
        'accountNumber' => '/[A-Za-z0-9]{6}/',
        'invoiceNumber' => '/^[^-\s][\w\s-]+$/',
        'invoiceAmount' => '/^[0-9]+\.?[0-9]*$/',
        'validateNull' => '/^\D+$/',
        'address' => '/^\D+$/',
        'date' => '/^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/'
    ];
	
	const HFW_SAMPLE_ACCOUNT = "hfw_sample_account";
}
