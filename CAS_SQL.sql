-- ****************** SqlDBM: MySQL ******************;
-- ***************************************************;

DROP TABLE `order_line`;


DROP TABLE `feed_back`;


DROP TABLE `room_service`;


DROP TABLE `food`;


DROP TABLE `orders`;


DROP TABLE `booking`;


DROP TABLE `kitchen`;


DROP TABLE `product`;


DROP TABLE `admin_login`;


DROP TABLE `food_category`;


DROP TABLE `room`;


DROP TABLE `guest`;


-- ************************************** `kitchen`

CREATE TABLE `kitchen`
(
 `chef_ID`       int NOT NULL AUTO_INCREMENT ,
 `chef_name`     varchar(255) NOT NULL ,
 `c_mobile_num`  varchar(255) NOT NULL ,
 `chef_password` varchar(255) NOT NULL ,
PRIMARY KEY (`chef_ID`)
);


-- ************************************** `product`

CREATE TABLE `product`
(
 `product_ID`   varchar(45) NOT NULL ,
 `product_name` varchar(255) NOT NULL ,
 `product_type` varchar(45) NOT NULL ,
 `Availability` tinyint(1) NOT NULL ,
PRIMARY KEY (`product_ID`)
);


-- ************************************** `admin_login`

CREATE TABLE `admin_login`
(
 `admin_ID`         int NOT NULL AUTO_INCREMENT ,
 `admin_name`       varchar(255) NOT NULL ,
 `admin_mobile_num` varchar(255) NOT NULL ,
 `admin_password`   varchar(255) NOT NULL ,
PRIMARY KEY (`admin_ID`)
);

-- ************************************** `food_category`

CREATE TABLE `food_category`
(
 `category_ID`   int NOT NULL AUTO_INCREMENT ,
 `category_name` varchar(255) NOT NULL ,
 `link`          varchar(100) NOT NULL ,
PRIMARY KEY (`category_ID`)
);


-- ************************************** `room`

CREATE TABLE `room`
(
 `room_ID`           int NOT NULL AUTO_INCREMENT ,
 `room_name`         varchar(255) NOT NULL ,
 `room_price`        double(8,2) NOT NULL ,
 `room_type`         char(4) NOT NULL ,
 `room_capacity`     int NOT NULL ,
 `room_availability` tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`room_ID`)
);


-- ************************************** `guest`

CREATE TABLE `guest`
(
 `guest_id`     int NOT NULL AUTO_INCREMENT ,
 `first_name`   varchar(255) NOT NULL ,
 `last_name`    varchar(255) NOT NULL ,
 `g_mobile_num` varchar(255) NOT NULL ,
 `username`     varchar(16) NOT NULL ,
 `password`     varchar(16) NOT NULL ,
PRIMARY KEY (`guest_id`)
);

-- ************************************** `feed_back`

CREATE TABLE `feed_back`
(
 `feed_back_ID`      int NOT NULL ,
 `guest_id`          int NOT NULL ,
 `feed_back_details` varchar(500) ,
 `rating`            int DEFAULT 0 ,
PRIMARY KEY (`feed_back_ID`),
KEY `fkIdx_223` (`guest_id`),
CONSTRAINT `FK_223` FOREIGN KEY `fkIdx_223` (`guest_id`) REFERENCES `guest` (`guest_id`)
);

-- ************************************** `room_service`

CREATE TABLE `room_service`
(
 `product_ID` varchar(45) NOT NULL ,
PRIMARY KEY (`product_ID`),
KEY `fkIdx_258` (`product_ID`),
CONSTRAINT `FK_258` FOREIGN KEY `fkIdx_258` (`product_ID`) REFERENCES `product` (`product_ID`)
);

-- ************************************** `food`

CREATE TABLE `food`
(
 `product_ID`  varchar(45) NOT NULL ,
 `category_ID` int NOT NULL ,
 `food_price`  double(8,2) NOT NULL ,
 `food_image`  varchar(255) ,
PRIMARY KEY (`product_ID`),
KEY `fkIdx_142` (`category_ID`),
CONSTRAINT `FK_142` FOREIGN KEY `fkIdx_142` (`category_ID`) REFERENCES `food_category` (`category_ID`),
KEY `fkIdx_255` (`product_ID`),
CONSTRAINT `FK_255` FOREIGN KEY `fkIdx_255` (`product_ID`) REFERENCES `product` (`product_ID`)
);


-- ************************************** `booking`

CREATE TABLE `booking`
(
 `booking_ID`           int NOT NULL AUTO_INCREMENT ,
 `guest_id`             int NOT NULL ,
 `room_ID`              int NOT NULL ,
 `number_guest`         int NOT NULL ,
 `check_in`             date NOT NULL ,
 `check_out`            date NOT NULL ,
 `booking_approve`      tinyint(1) NOT NULL DEFAULT 0 ,
 `booking_approve_time` timestamp DEFAULT CURRENT_TIMESTAMP,
 `status`               tinyint NOT NULL ,
PRIMARY KEY (`booking_ID`),
KEY `fkIdx_54` (`guest_id`),
CONSTRAINT `FK_54` FOREIGN KEY `fkIdx_54` (`guest_id`) REFERENCES `guest` (`guest_id`),
KEY `fkIdx_58` (`room_ID`),
CONSTRAINT `FK_58` FOREIGN KEY `fkIdx_58` (`room_ID`) REFERENCES `room` (`room_ID`)
);

-- ************************************** `orders`

CREATE TABLE `orders`
(
 `order_ID`           int NOT NULL AUTO_INCREMENT ,
 `booking_ID`         int NOT NULL ,
 `room_ID`            int NOT NULL ,
 `order_time`         timestamp NOT NULL ,
 `o_approve_by_admin` tinyint(1) NOT NULL ,
 `o_approve_time`     timestamp NOT NULL ,
 `order_done`         tinyint(1) NOT NULL ,
 `order_status`       varchar(20) ,
PRIMARY KEY (`order_ID`),
KEY `fkIdx_103` (`booking_ID`),
CONSTRAINT `FK_103` FOREIGN KEY `fkIdx_103` (`booking_ID`) REFERENCES `booking` (`booking_ID`),
KEY `fkIdx_187` (`room_ID`),
CONSTRAINT `FK_187` FOREIGN KEY `fkIdx_187` (`room_ID`) REFERENCES `room` (`room_ID`)
);

-- ************************************** `order_line`

CREATE TABLE `order_line`
(
 `order_line_ID` int NOT NULL AUTO_INCREMENT ,
 `order_ID`      int NOT NULL ,
 `product_ID`    varchar(45) NOT NULL ,
 `quantity`      int ,
 `subtotal`      double(8,2) ,
PRIMARY KEY (`order_line_ID`),
KEY `fkIdx_261` (`product_ID`),
CONSTRAINT `FK_261` FOREIGN KEY `fkIdx_261` (`product_ID`) REFERENCES `product` (`product_ID`),
KEY `fkIdx_296` (`order_ID`),
CONSTRAINT `FK_296` FOREIGN KEY `fkIdx_296` (`order_ID`) REFERENCES `orders` (`order_ID`)
);










