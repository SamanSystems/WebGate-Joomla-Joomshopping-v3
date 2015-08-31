<?php
/**
 * @package    joomshoppingzarrinpal
 * @subpackage D:
 * @author     امیررضا تهرانی {@link http://joomina.ir}
 * @author     Created on 24-Jul-2015
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');

if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);
/**
 * Script file for joomshoppingzarrinpal component.
 */
class com_joomshoppingzarrinpalInstallerScript
{
    /**
     * Method to run before an install/update/uninstall method.
     *
     * @return void
     */
    public function preflight($type, $parent)
    {
     
   
	
    }//function

    /**
     * Method to install the component.
     *
     * @return void
     */
    public function install($parent)
    {
        // $parent is the class calling this method
        //	$parent->getParent()->setRedirectURL('index.php?option=com_joomshoppingzarrinpal');
    }//function

    /**
     * Method to update the component.
     *
     * @return void
     */
    public function update($parent)
    {
        // $parent is the class calling this method
    }//function

    /**
     * Method to run after an install/update/uninstall method.
     *
     * @return void
     */
    public function postflight($type, $parent)
    {
        // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
       
	      // $parent is the class calling this method
        // $type is the type of change (install, update or discover_install)
         $dir = "/components/com_joomshoppingzarrinpal/bank";//"path/to/targetFiles";
    $dirNew = "viejo2014";//path/to/destination/files
    // Open a known directory, and proceed to read its contents
   
   //copy('foo/test.php', 'bar/test.php');
   
     jimport('joomla.filesystem.folder');   
     jimport( 'joomla.filesystem.file' );
   
    //change this to the name of the folder you want to create
        $newfolder = 'pm_zarinpal';

        if(JFolder::create( '../components/com_jshopping/payments/' . $newfolder)) {        
            //duplicate the line below as many times as you want for each file you want to move
           
        }
		
		JFolder::move(JPATH_ROOT.DS."components/com_joomshoppingzarrinpal/bank/lib", JPATH_ROOT.DS."components/com_jshopping/payments/pm_zarinpal/lib");
   
   $filename = '../components/com_joomshoppingzarrinpal/bank/paymentform.php';
   
	$newfile ='../components/com_jshopping/payments/pm_zarinpal/paymentform.php';
	JFile::copy($filename, $newfile);
	
	   $filename = '../components/com_joomshoppingzarrinpal/bank/adminparamsform.php';
   
	$newfile ='../components/com_jshopping/payments/pm_zarinpal/adminparamsform.php';
	JFile::copy($filename, $newfile);

   $filename = '../components/com_joomshoppingzarrinpal/bank/pm_zarinpal.php';
   
	$newfile ='../components/com_jshopping/payments/pm_zarinpal/pm_zarinpal.php';
	JFile::copy($filename, $newfile);
	
	
	$filename = '../components/com_joomshoppingzarrinpal/bank/finish.php';
   
	$newfile ='../components/com_jshopping/templates/default/checkout/finish.php';
	JFile::copy($filename, $newfile);

	 
	   
	   
    }//function

    /**
     * Method to uninstall the component.
     *
     * @return void
     */
    public function uninstall($parent)
    {
        // $parent is the class calling this method
        echo '<p>'.JText::_('COM_JOOMSHOPPINGZARRINPAL_UNINSTALL_TEXT').'</p>';
    }//function
}//class
