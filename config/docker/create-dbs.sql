CREATE DATABASE `doctrine10905` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `doctrine10905`;

CREATE TABLE `product` (`name` VARCHAR(50) NOT NULL, PRIMARY KEY(`name`)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;
CREATE TABLE `machine` (`name` VARCHAR(50) NOT NULL, PRIMARY KEY(`name`)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;

CREATE TABLE `product_available_machine` (`product` VARCHAR(50) NOT NULL, `machine` VARCHAR(50) NOT NULL, PRIMARY KEY(`product`, `machine`), INDEX `IDX_2AD6C6821505DF84` (`machine`)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;
ALTER TABLE `product_available_machine` ADD CONSTRAINT `product` FOREIGN KEY (`product`) REFERENCES `product` (`name`);
ALTER TABLE `product_available_machine` ADD CONSTRAINT `machine` FOREIGN KEY (`machine`) REFERENCES `machine` (`name`);

CREATE TABLE `product_default_machine` (`product` VARCHAR(50) NOT NULL, `location` VARCHAR(50) NOT NULL, `machine` VARCHAR(50) NOT NULL, PRIMARY KEY (`product`, `location`), INDEX `IDX_D50B8B5CD34A04AD` (`product`), INDEX `IDX_D50B8B5CD34A04AD1505DF84` (`product`, `machine`));
ALTER TABLE `product_default_machine` ADD CONSTRAINT `default_product` FOREIGN KEY (`product`) REFERENCES `product` (`name`);
ALTER TABLE `product_default_machine` ADD CONSTRAINT `default_product_machine` FOREIGN KEY (`product`, `machine`) REFERENCES `product_available_machine` (`product`, `machine`);

INSERT INTO `product` VALUES ('teacup'), ('fork'), ('bottle');
INSERT INTO `machine` VALUES ('planer'), ('drillpress'), ('injection molder');

INSERT INTO `product_available_machine` VALUES ('teacup', 'injection molder'), ('teacup', 'drillpress'), ('fork', 'injection molder');

INSERT INTO `product_default_machine` VALUES ('teacup', 'berlin', 'injection molder'), ('teacup', 'essen', 'drillpress');
