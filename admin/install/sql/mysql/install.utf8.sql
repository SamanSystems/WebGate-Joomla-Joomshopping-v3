INSERT INTO `#__jshopping_payment_method` (`payment_id`, `name_en-GB`, `name_fa-IR`, `description_en-GB`, `description_fa-IR`, `payment_code`, `payment_class`, `payment_publish`, `payment_ordering`, `payment_params`, `payment_type`, `tax_id`, `price`, `show_descr_in_email`) VALUES
(NULL, 'zarinpal','zarinpal', 'zarinpal', 'درگاه پرداخت زرین پال', 'zarinpal','pm_zarinpal', 0, 5, 'api=123456\n transaction_end_status=6\n transaction_pending_status=1\n transaction_failed_status=3\n checkdatareturn=0', 2, 0, 0, 0);

CREATE TABLE IF NOT EXISTS `#__jshop_joomina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(225) NOT NULL,
  `refid` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


