SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `wst_orders`;
CREATE TABLE `wst_orders` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `orderNo` varchar(20) NOT NULL,
  `userId` int(11) NOT NULL,
  `goodsMoney` decimal(11,2) NOT NULL,
  `deliverType` tinyint(4) NOT NULL DEFAULT '0',
  `deliverMoney` decimal(11,2) NOT NULL DEFAULT '0.00',
  `totalMoney` decimal(11,2) NOT NULL,
  `realTotalMoney` decimal(11,2) NOT NULL DEFAULT '0.00',
  `orderStatus` tinyint(4) DEFAULT '0',
  `payType` tinyint(4) NOT NULL DEFAULT '0',
  `payFrom` int(11) NOT NULL DEFAULT '0',
  `isPay` tinyint(4) NOT NULL DEFAULT '0',
  `areaId` int(11) NOT NULL,
  `areaIdPath` varchar(255) DEFAULT NULL,
  `userName` varchar(20) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userPhone` char(11) DEFAULT NULL,
  `orderScore` int(11) NOT NULL DEFAULT '0',
  `isInvoice` tinyint(4) NOT NULL DEFAULT '0',
  `invoiceClient` varchar(255) DEFAULT NULL,
  `orderRemarks` varchar(255) DEFAULT NULL,
  `orderSrc` tinyint(4) NOT NULL DEFAULT '0',
  `needPay` decimal(11,2) DEFAULT '0.00',
  `isRefund` tinyint(4) NOT NULL DEFAULT '0',
  `isAppraise` tinyint(4) DEFAULT '0',
  `cancelReason` int(11) DEFAULT '0',
  `rejectReason` int(11) DEFAULT '0',
  `rejectOtherReason` varchar(255) DEFAULT NULL,
  `isClosed` tinyint(4) NOT NULL DEFAULT '0',
  `goodsSearchKeys` text,
  `receiveTime` datetime DEFAULT NULL,
  `deliveryTime` datetime DEFAULT NULL,
  `expressId` int(11) DEFAULT NULL,
  `expressNo` varchar(20) DEFAULT NULL,
  `tradeNo` varchar(100) DEFAULT NULL,
  `dataFlag` tinyint(4) NOT NULL DEFAULT '1',
  `createTime` datetime NOT NULL,
  PRIMARY KEY (`orderId`),
  KEY `shopId` (`dataFlag`),
  KEY `userId` (`userId`,`dataFlag`),
  KEY `isRefund` (`isRefund`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO `wst_orders` VALUES ('1', '100000003', '35', '18.00', '0', '5.00', '23.00', '23.00', '2', '0', '0', '0', '440118', '440000_440100_440118_', 'asfas', '广东省广州市增城区fasfda', '1234453231', '18', '1', '这里是发票抬头', 'zheli shi liuyan', '0', '23.00', '0', '1', '0', '0', null, '1', null, '2016-12-26 10:56:18', '2016-12-26 10:52:33', '1', '123456782', null, '1', '2016-12-26 10:47:57'),
('2', '100000014', '35', '100.00', '0', '5.00', '105.00', '105.00', '-2', '1', '0', '0', '440118', '440000_440100_440118_', 'asfas', '广东省广州市增城区fasfdae', '1234453231', '100', '0', '', 'sdfasd', '0', '105.00', '0', '0', '0', '0', null, '0', null, null, null, null, null, null, '1', '2016-12-26 11:06:04'),
('3', '100000025', '35', '65.00', '0', '5.00', '70.00', '0.01', '-2', '1', '0', '0', '440118', '440000_440100_440118_', 'asfas', '广东省广州市增城区fasfdae', '1234453231', '65', '0', '', '在线支付测试', '0', '70.00', '0', '0', '0', '0', null, '0', null, null, null, null, null, null, '1', '2016-12-26 11:11:37'),
('4', '100000036', '35', '0.01', '0', '0.00', '0.01', '0.01', '0', '1', '1', '1', '440118', '440000_440100_440118_', 'asfas', '广东省广州市增城区fasfdae', '1234453231', '0', '0', '', '测试在线支付', '0', '0.00', '0', '0', '0', '0', null, '0', null, null, null, null, null, '2016122621001004580250565905', '1', '2016-12-26 11:17:48'),
('5', '100000040', '34', '347.00', '0', '6.00', '353.00', '353.00', '2', '0', '0', '0', '440118', '440000_440100_440118_', '张无忌', '广东省广州市增城区朱村碧桂园城市花园', '13873313009', '347', '1', '广州商淘信息科技有限公司', '麻烦帮我包装好一些，谢谢~~', '0', '353.00', '0', '1', '0', '0', null, '1', null, '2016-12-26 16:32:57', '2016-12-26 16:32:48', '2', '201602352345533', null, '1', '2016-12-26 16:20:57'),
('6', '100000051', '34', '369.00', '0', '6.00', '375.00', '375.00', '2', '0', '0', '0', '440118', '440000_440100_440118_', '张无忌', '广东省广州市增城区朱村碧桂园城市花园', '13873313009', '369', '0', '', '', '0', '375.00', '0', '1', '0', '0', null, '1', null, '2016-12-26 16:39:56', '2016-12-26 16:39:45', '0', '', null, '1', '2016-12-26 16:39:32'),
('7', '100000062', '34', '356.00', '0', '6.00', '362.00', '362.00', '2', '0', '0', '0', '440118', '440000_440100_440118_', '张无忌', '广东省广州市增城区朱村碧桂园城市花园', '13873313009', '356', '0', '', '', '0', '362.00', '0', '1', '0', '0', null, '1', null, '2016-12-26 16:42:52', '2016-12-26 16:42:19', '6', '2016023423434', null, '1', '2016-12-26 16:41:05'),
('8', '100000073', '34', '8.00', '0', '6.00', '14.00', '14.00', '2', '0', '0', '0', '440118', '440000_440100_440118_', '张无忌', '广东省广州市增城区朱村碧桂园城市花园', '13873313009', '8', '0', '', '', '0', '14.00', '0', '0', '0', '0', null, '0', null, '2016-12-26 16:42:49', '2016-12-26 16:42:09', '5', '20160203423343', null, '1', '2016-12-26 16:41:18'),
('9', '100000084', '34', '600.90', '0', '6.00', '606.90', '606.90', '2', '0', '0', '0', '440118', '440000_440100_440118_', '张无忌', '广东省广州市增城区朱村碧桂园城市花园', '13873313009', '601', '0', '', '', '0', '606.90', '0', '1', '0', '0', null, '1', null, '2016-12-26 16:42:47', '2016-12-26 16:42:00', '5', '201601223432334', null, '1', '2016-12-26 16:41:43'),
('10', '100000095', '32', '2290.50', '0', '6.00', '2296.50', '2296.50', '2', '0', '0', '0', '440111', '440000_440100_440111_', '曹火昆', '广东省广州市白云区圣诞节来发掘了', '13151516516', '2291', '0', '', '', '0', '2296.50', '0', '1', '0', '0', null, '1', null, '2016-12-27 10:31:22', '2016-12-27 10:31:11', '1', '', null, '1', '2016-12-27 10:30:51'),
('11', '100000106', '32', '428.40', '0', '6.00', '434.40', '434.40', '2', '0', '0', '0', '440111', '440000_440100_440111_', '曹火昆', '广东省广州市白云区圣诞节来发掘了', '13151516516', '428', '0', '', '', '0', '434.40', '0', '0', '0', '0', null, '0', null, '2016-12-27 10:54:32', '2016-12-27 10:54:15', '0', '', null, '1', '2016-12-27 10:53:55'),
('12', '100000110', '34', '7655.70', '0', '6.00', '7661.70', '7661.70', '2', '0', '0', '0', '440118', '440000_440100_440118_', '张无忌', '广东省广州市增城区朱村碧桂园城市花园', '13873313009', '7656', '0', '', '', '0', '7661.70', '0', '1', '0', '0', null, '1', null, '2016-12-27 11:39:58', '2016-12-27 11:39:49', '3', '20160323124443334', null, '1', '2016-12-27 11:39:27'),
('13', '100000121', '34', '455.00', '0', '6.00', '461.00', '461.00', '2', '0', '0', '0', '440118', '440000_440100_440118_', '张无忌', '广东省广州市增城区朱村碧桂园城市花园', '13873313009', '455', '0', '', '', '0', '461.00', '0', '1', '0', '0', null, '1', null, '2016-12-27 11:47:45', '2016-12-27 11:47:11', '0', '', null, '1', '2016-12-27 11:47:02');
