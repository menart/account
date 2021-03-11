CREATE SCHEMA `account` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;

CREATE TABLE `account`.`user`
(
    `id`          INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `login`       VARCHAR(100) NOT NULL COMMENT 'логин',
    `password`    VARCHAR(32)  NOT NULL COMMENT 'хэш пароля',
    `name`        VARCHAR(45)  NULL COMMENT 'Имя',
    `second_name` VARCHAR(45)  NULL COMMENT 'Отчество',
    `surname`     VARCHAR(45)  NULL COMMENT 'Фамилия',
    `email`       VARCHAR(45)  NULL COMMENT 'email',
    `phone`       VARCHAR(45)  NULL COMMENT 'телефон',
    `created_at`  DATETIME     NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'создано',
    `updated_at`  DATETIME     NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'изменено',
    PRIMARY KEY (`id`),
    UNIQUE INDEX `idx_user_login` (`login` ASC) VISIBLE
);
