# magento
Play with Magento Platform

1. Install Magento 2.2.6

2. Add Module to "magento/app/code" folder.

3. Go to Command line in window or terminal in linux

4. Run upgrade:
	+ Window:
		- php c:\xampp\htdocs\magento\bin\magento setup:upgrade
		- php c:\xampp\htdocs\magento\bin\magento setup:static-content:deploy -f
		- php c:\xampp\htdocs\magento\bin\magento c:c
	+ Linux:
		- php bin\magento setup:upgrade
		- php bin\magento setup:static-content:deploy -f
		- php bin\magento c:c
	
5. If not enough permission. Please add permission to folder contain code.
