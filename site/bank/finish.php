<?php 
/**
* @version      4.8.0 13.08.2013
* @author       MAXXmarketing GmbH
* @package      Jshopping
* @copyright    Copyright (C) 2010 webdesigner-profi.de. All rights reserved.
* @license      GNU/GPL
*/
defined('_JEXEC') or die('Restricted access');
?>
<?php if (!empty($this->text)){?>
<?php 
		$session =& JFactory::getSession();
		$orderID = $session->get( 'orderID');
		$refid= $session->get( 'RefID');
		
		echo 'ضمن سپاس از خرید شما کالای مورد نظر '. ' خریداری شد و پرداخت مبلغ آن مورد تایید است.'."<br>" . 'شماره سفارش شما : '. $orderID.' میباشد و شماره تراکنش شما نیز برابر :'. $refid . 'است '."<br>" . 'لطفا در حفظ  و نگه داری شماره تراکنش دقت بفرمایید';
	
		$db = JFactory::getDBO();
		$query = "INSERT INTO `#__jshop_joomina` (`id`, `orderid`, `refid`) VALUES (NULL, '".$orderID."', '".$refid."');";
		$db->setQuery($query);
		$result = $db->query();


echo $this->text;?>
<?php }else{?>
<p><?php 

$session =& JFactory::getSession();
		$orderID = $session->get( 'orderID');
		$refid= $session->get( 'RefID');
		$item_name = $session->get( 'item_name');
		echo 'ضمن سپاس از خرید شما کالای مورد نظر '. ' خریداری شد و پرداخت مبلغ آن مورد تایید است.'."<br>" . 'شماره سفارش شما : '. $orderID.' میباشد و شماره تراکنش شما نیز برابر :'. $refid . 'است '."<br>" . 'لطفا در حفظ  و نگه داری شماره تراکنش دقت بفرمایید';
			$db = JFactory::getDBO();
		$query = "INSERT INTO `#__jshop_joomina` (`id`, `orderid`, `refid`) VALUES (NULL, '".$orderID."', '".$refid."');";
		$db->setQuery($query);
		$result = $db->query();
print _JSHOP_THANK_YOU_ORDER?></p>
<?php }?>