CREATE TABLE `products` (
  `sn` int(25) NOT NULL,
  `sku` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` varchar(255) NOT NULL,
  `type` varchar(25) NOT NULL,
  `details` varchar(255) NOT NULL,
  `deleted` varchar(25) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `products`
  ADD PRIMARY KEY (`sn`);


ALTER TABLE `products`
  MODIFY `sn` int(25) NOT NULL AUTO_INCREMENT;
COMMIT;