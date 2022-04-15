#Table should be called Products (id, name, description, category, stock, created, modified, unit_price, visibility [true, false])

CREATE TABLE IF NOT EXISTS `Products` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(40) NOT NULL,
    `description` VARCHAR(300) NOT NULL,
    `category` VARCHAR(20) NOT NULL,
    `stock` INT NOT NULL,
    image text,
    `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    `unit_price`  FLOAT NOT NULL,
    `visibility`  TINYINT(1) default 1 NOT NULL,
    check (stock >= 0),
    check (unit_price >= 0)
    PRIMARY KEY (`id`)
)
