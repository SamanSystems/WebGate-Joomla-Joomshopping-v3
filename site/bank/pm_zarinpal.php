<meta charset="utf-8">
<?php
/**
* @package	Joomshoping for Joomla!
* @copyright	Copyright (C) 2015 Afzoneha.ir Mohamad Deljou
* @license		do not copy please. for order or technical support call me at 09355384337
* @autor url    http://www.Afzoneha.ir/
* @autor email  info@afzoneha.ir
* @Developer    Mohamad Deljou - www.Afzoneha.ir
* 
*/
defined('_JEXEC') or die('Restricted access');

class pm_zarinpal extends PaymentRoot
{

	function showPaymentForm($params, $pmconfigs)
	{
		include(dirname(__FILE__)."/paymentform.php");
	}

	//function call in admin
	function showAdminFormParams($params)
	{
		$array_params = array('api', 'transaction_end_status', 'transaction_pending_status', 'transaction_failed_status');
		foreach ($array_params as $key)
		{
			if (!isset($params[$key])) $params[$key] = '';
		}
      if (!isset($params['use_ssl'])) $params['use_ssl'] = 0;
      if (!isset($params['address_override'])) $params['address_override'] = 0; 
		//$orders = &JModel::getInstance('orders', 'JshoppingModel'); //admin model
		$orders = JSFactory::getModel('orders', 'JshoppingModel'); //admin model
		include(dirname(__FILE__)."/adminparamsform.php");
	}

	function checkTransaction($pmconfigs, $order, $act)
	{
		$session = JFactory::getSession();
		@session_start();
		//$jshopConfig = &JSFactory::getConfig();
		$jshopConfig = JSFactory::getConfig();
		$pm_method = $this->getPmMethod();
		$api = $pmconfigs['api'];
		
			$session =& JFactory::getSession();
		  $orderID= $session->get( 'orderID');
		 
		   
		   
		   
		   
		   require_once('lib/nusoap.php');
	
	$MerchantID = $api;
	$Amount =  $session->get( 'price'); //Amount will be based on Toman
	$Authority = $_GET['Authority'];
	
	if($_GET['Status'] == 'OK'){
		// URL also Can be https://ir.zarinpal.com/pg/services/WebGate/wsdl
		$client = new nusoap_client('https://de.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl'); 
		$client->soap_defencoding = 'UTF-8';
		$result = $client->call('PaymentVerification', array(
															array(
																	'MerchantID'	 => $MerchantID,
																	'Authority' 	 => $Authority,
																	'Amount'	 	 => $Amount
																)
															)
		);
		$data = array( $result['RefID'], $orderID);
		if($result['Status'] == 100){
			echo $dataalert = "پرداخت با موفقیت انجام شد. شماره سفارش: $orderID , شماره پیگیری: ".$result['RefID'];
		$session =& JFactory::getSession();
		$session->set( 'orderID', $orderID);
		$session->set( 'RefID', $result['RefID']);
		
		$session->set( 'item_name', $item_name);
			saveToLog("payment.log", "new Pay. Order ID ".$orderID.". pay verified ");
			return array(1, 'پرداخت با موفقیت انجام شد. شماره سفارش:'. $orderID.' , شماره پیگیری: '.$result['RefID'], $result['RefID'], $data);
			
			
		} else {
			echo 'Transation failed. Status:'. $result['Status'];
		}

	} else {
		echo 'Transaction canceled by user';
	}
	
		
		
			
			
		
	}

	function showEndForm($pmconfigs, $order)
	{
		//$jshopConfig = &JSFactory::getConfig();
		/*$item_name = sprintf(_JSHOP_PAYMENT_PRODUCT_IN_SITE, $jshopConfig->store_name);*/
		$jshopConfig = JSFactory::getConfig();
		$pm_method = $this->getPmMethod();
		$item_name = sprintf(_JSHOP_PAYMENT_NUMBER, $order->order_number);
		$api = $pmconfigs['api'];
		/*
		$notify_url = JURI::root() . "index.php?option=com_jshopping&controller=checkout&task=step7&act=notify&js_paymentclass=pm_zarinpal&no_lang=1";
		$return = JURI::root(). "index.php?option=com_jshopping&controller=checkout&task=step7&act=return&orderid=".$order->order_id."&js_paymentclass=pm_zarinpal";
		$cancel_return = JURI::root() . "index.php?option=com_jshopping&controller=checkout&task=step7&act=cancel&js_paymentclass=pm_zarinpal";
		$_country = &JTable::getInstance('country', 'jshop');
		$_country->load($order->country);
		$country = $_country->country_code_2;
		*/
		$uri = JURI::getInstance();        
		$liveurlhost = $uri->toString(array("scheme",'host', 'port'));
		$notify_url = JURI::root()."index.php?option=com_jshopping&controller=checkout&task=step7&act=notify&js_paymentclass=".$pm_method->payment_class."&no_lang=1";
		if (1)
		//$pmconfigs['notifyurlsef']
		$notify_url = $liveurlhost.SEFLink("index.php?option=com_jshopping&controller=checkout&task=step7&act=notify&js_paymentclass=".$pm_method->payment_class."&no_lang=1");
		$return = $liveurlhost.SEFLink("index.php?option=com_jshopping&controller=checkout&task=step7&act=return&js_paymentclass=".$pm_method->payment_class);
		$cancel_return = $liveurlhost.SEFLink("index.php?option=com_jshopping&controller=checkout&task=step7&act=cancel&js_paymentclass=".$pm_method->payment_class);

		$Amount      = round($order->order_total);
		$callBackUrl = $return."&orderID=".$order->order_id;
		$session =& JFactory::getSession();
		$session->set( 'orderID', $order->order_id);
		$session->set( 'price', $Amount);
		
		
		require_once('lib/nusoap.php');
	
	$MerchantID = $api;  //Required
	$Amount = $Amount; //Amount will be based on Toman  - Required
	$Description = $item_name;  // Required
	$Email = ''; // Optional
	$Mobile =''; // Optional
	 $CallbackURL = $callBackUrl;  // Required
	
	
	
	// URL also Can be https://ir.zarinpal.com/pg/services/WebGate/wsdl
	$client = new nusoap_client('https://de.zarinpal.com/pg/services/WebGate/wsdl', 'wsdl'); 
	$client->soap_defencoding = 'UTF-8';
	$result = $client->call('PaymentRequest', array(
													array(
															'MerchantID' 	=> $MerchantID,
															'Amount' 		=> $Amount,
															'Description' 	=> $Description,
															'Email' 		=> $Email,
															'Mobile' 		=> $Mobile,
															'CallbackURL' 	=> $CallbackURL
														)
													)
	);
	
	//Redirect to URL You can do it also by creating a form
	if($result['Status'] == 100)
	{
		Header('Location: https://www.zarinpal.com/pg/StartPay/'.$result['Authority']);
	} else {
		echo'ERR: '.$result['Status'];
	}
		
		
		
				
	}

	function getUrlParams($pmconfigs)
	{
		$params = array();
		$params['order_id'] = JRequest::getInt("orderID");
		$params['hash'] = "";
		$params['checkHash'] = 0;
		$params['checkReturnParams'] = 1;// $pmconfigs['checkdatareturn'];
		return $params;
	}

}

?>