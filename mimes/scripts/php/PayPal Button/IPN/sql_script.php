# Table structure for table `paypal_cart_info` 	#

CREATE TABLE `paypal_cart_info` (
  `txnid` varchar(30) NOT NULL default '',
  `itemname` varchar(255) NOT NULL default '',
  `itemnumber` varchar(50) default NULL,
  `os0` varchar(20) default NULL,
  `on0` varchar(50) default NULL,
  `os1` varchar(20) default NULL,
  `on1` varchar(50) default NULL,
  `quantity` char(3) NOT NULL default '',
  `invoice` varchar(255) NOT NULL default '',
  `custom` varchar(255) NOT NULL default ''
) TYPE=MyISAM;



# Table structure for table `paypal_subscription_info` #


CREATE TABLE `paypal_subscription_info` (
  `subscr_id` varchar(255) NOT NULL default '',
  `sub_event` varchar(50) NOT NULL default '',
  `subscr_date` varchar(255) NOT NULL default '',
  `subscr_effective` varchar(255) NOT NULL default '',
  `period1` varchar(255) NOT NULL default '',
  `period2` varchar(255) NOT NULL default '',
  `period3` varchar(255) NOT NULL default '',
  `amount1` varchar(255) NOT NULL default '',
  `amount2` varchar(255) NOT NULL default '',
  `amount3` varchar(255) NOT NULL default '',
  `mc_amount1` varchar(255) NOT NULL default '',
  `mc_amount2` varchar(255) NOT NULL default '',
  `mc_amount3` varchar(255) NOT NULL default '',
  `recurring` varchar(255) NOT NULL default '',
  `reattempt` varchar(255) NOT NULL default '',
  `retry_at` varchar(255) NOT NULL default '',
  `recur_times` varchar(255) NOT NULL default '',
  `username` varchar(255) NOT NULL default '',
  `password` varchar(255) default NULL,
  `payment_txn_id` varchar(50) NOT NULL default '',
  `subscriber_emailaddress` varchar(255) NOT NULL default '',
  `datecreation` date NOT NULL default '0000-00-00'
) TYPE=MyISAM;






# Table structure for table `paypal_payment_info` #


CREATE TABLE `paypal_payment_info` (
  `firstname` varchar(100) NOT NULL default '',
  `lastname` varchar(100) NOT NULL default '',
  `buyer_email` varchar(100) NOT NULL default '',
  `street` varchar(100) NOT NULL default '',
  `city` varchar(50) NOT NULL default '',
  `state` char(3) NOT NULL default '',
  `zipcode` varchar(11) NOT NULL default '',
  `memo` varchar(255) default NULL,
  `itemname` varchar(255) default NULL,
  `itemnumber` varchar(50) default NULL,
  `os0` varchar(20) default NULL,
  `on0` varchar(50) default NULL,
  `os1` varchar(20) default NULL,
  `on1` varchar(50) default NULL,
  `quantity` char(3) default NULL,
  `paymentdate` varchar(50) NOT NULL default '',
  `paymenttype` varchar(10) NOT NULL default '',
  `txnid` varchar(30) NOT NULL default '',
  `mc_gross` varchar(6) NOT NULL default '',
  `mc_fee` varchar(5) NOT NULL default '',
  `paymentstatus` varchar(15) NOT NULL default '',
  `pendingreason` varchar(10) default NULL,
  `txntype` varchar(10) NOT NULL default '',
  `tax` varchar(10) default NULL,
  `mc_currency` varchar(5) NOT NULL default '',
  `reasoncode` varchar(20) NOT NULL default '',
  `custom` varchar(255) NOT NULL default '',
  `country` varchar(20) NOT NULL default '',
  `datecreation` date NOT NULL default '0000-00-00'
) TYPE=MyISAM;