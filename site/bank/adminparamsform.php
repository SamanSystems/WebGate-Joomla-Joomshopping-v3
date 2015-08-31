<div class="col100">
<fieldset class="adminform">


<table style="text-align:right" class="admintable" width = "100%" >
 <tr>
	<td>
	    <img src="http://www.topjoomina.ir/do.php?imgf=6daf909a72931.png" width="150"/></td>
    <td>پلاگین پرداخت زرین پال برای جوم شاپینگ  <br>
نگارش یافته توسط  <a href="http://joomina.ir" target="_blank">گروه طراحان وب جومینا</a><br>
<b>پلاگین های بانکی این افزونه را برایگان از سایت جومینا دانلود کنید</b><br>
<br>
<b style="color:#3261C0">برنامه نویس : امیررضا تهرانی</b></td>
 </tr>
 <tr>
   <td class="key">
     کد درگاه زرین پال 
   </td>
   <td style="text-align: right;">
     <input type = "text" class = "inputbox" name = "pm_params[api]" size="45" value = "<?php echo $params['api']?>" />
     <?php //echo JHTML::tooltip(_JSHOP_SOFORTUEBERWEISUNG_DESCRIPTION);?>             
   </td>
 </tr>
 <tr>
   <td class="key">
     <?php echo _JSHOP_TRANSACTION_END;?>
   </td>
   <td style="text-align: right;">
     <?php              
     print JHTML::_('select.genericlist', $orders->getAllOrderStatus(), 'pm_params[transaction_end_status]', 'class = "inputbox" size = "1"', 'status_id', 'name', $params['transaction_end_status'] );
    // echo " ".JHTML::tooltip(_JSHOP_PAYPAL_TRANSACTION_END_DESCRIPTION);
     ?>
   </td>
 </tr>
 <tr>
   <td class="key">
     <?php echo _JSHOP_TRANSACTION_PENDING;?>
   </td>
   <td style="text-align: right;">
     <?php 
     echo JHTML::_('select.genericlist',$orders->getAllOrderStatus(), 'pm_params[transaction_pending_status]', 'class = "inputbox" size = "1"', 'status_id', 'name', $params['transaction_pending_status']);
  //   echo " ".JHTML::tooltip(_JSHOP_PAYPAL_TRANSACTION_PENDING_DESCRIPTION);
     ?>
   </td>
 </tr>
 <tr>
   <td class="key">
     <?php echo _JSHOP_TRANSACTION_FAILED;?>
   </td>
   <td style="text-align: right;">
     <?php 
     echo JHTML::_('select.genericlist',$orders->getAllOrderStatus(), 'pm_params[transaction_failed_status]', 'class = "inputbox" size = "1"', 'status_id', 'name', $params['transaction_failed_status']);
   //  echo " ".JHTML::tooltip(_JSHOP_PAYPAL_TRANSACTION_FAILED_DESCRIPTION);
     ?>
   </td>
 </tr>
</table>
</fieldset>
</div>
<div class="clr"></div>