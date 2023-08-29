CREATE TABLE `inventory` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_of_expiry` date NOT NULL,
  `available_inventory` int(255) NOT NULL,
  `available_inventory_cost` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
)