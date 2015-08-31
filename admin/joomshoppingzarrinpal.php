<?php
/**
 * @package    joomshoppingzarrinpal
 * @subpackage D:
 * @author     amirrezatehrani {@link joomina.ir}
 * @author     Created on 26-Jul-2015
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');


?>
<table class="table">
  <tbody>
    <tr>
      <th>شناسه</th>
        <th>نام کالا</th>
      <th>شماره سفارش</th>
      <th>شماره تراکنش</th>
      <th>تاریخ پرداخت</th>
      <th>مبلغ پرداخت</th>
      <th>نام پرداخت کننده</th>
    </tr>
    <?php 
	$db = JFactory::getDBO();
 	$query = "SELECT * FROM #__jshop_joomina";
	$db->setQuery($query);
	$tars = $db->loadObjectList();
foreach ($tars as $tar){
	
	?>
    <tr>
      <td><?php echo $tar->id ?></td>
        <?php $db = JFactory::getDBO();
 	$query = "SELECT * FROM #__jshopping_orders";
	$db->setQuery($query);
	$order = $db->loadObject();
	
	$db = JFactory::getDBO();
 	$query = "SELECT * FROM #__jshopping_order_item where `order_id` ='".$tar->orderid."'";
	$db->setQuery($query);
	$ordername = $db->loadObject();
	
	?>
    <td><a href="index.php?option=com_jshopping&controller=orders&task=show&order_id=<?php echo $tar->orderid ?>"><?php echo $ordername->product_name ?></a></td>
      
      <td><a href="index.php?option=com_jshopping&controller=orders&task=show&order_id=<?php echo $tar->orderid ?>"><?php echo $tar->orderid ?></a></td>
      <td><?php echo $tar->refid ?></td>
    
      <td><?php echo JHTML::_('date',$order->order_m_date,"D d M Y") ?></td>
      <td><?php echo $order->order_total ?></td>
      <td><?php echo $order->f_name . ' ' . $order->l_name?></td>
    </tr>
    <?php } //tar?>
  </tbody>
</table>
