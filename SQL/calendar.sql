-- Guide To Design Database For Calendar Event And Reminder In MySQL

-- DATABASE NAME : nugfhltmhosting_booking

-- Calendar Database
CREATE SCHEMA `nugfhltmhosting_booking` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- User Table
CREATE TABLE `nugfhltmhosting_booking`.`user` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `firstName` VARCHAR(50) NULL DEFAULT NULL,
  `middleName` VARCHAR(50) NULL DEFAULT NULL,
  `lastName` VARCHAR(50) NULL DEFAULT NULL,
  `username` VARCHAR(50) NULL DEFAULT NULL,
  `mobile` VARCHAR(15) NULL,
  `email` VARCHAR(50) NULL,
  `passwordHash` VARCHAR(32) NOT NULL,
  `registeredAt` DATETIME NOT NULL,
  `lastLogin` DATETIME NULL DEFAULT NULL,
  `intro` TINYTEXT NULL DEFAULT NULL,
  `profile` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `uq_username` (`username` ASC),
  UNIQUE INDEX `uq_mobile` (`mobile` ASC),
  UNIQUE INDEX `uq_email` (`email` ASC) );


-- Event Table
CREATE TABLE `nugfhltmhosting_booking`.`event` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `userId` BIGINT NOT NULL,
  `sourceId` BIGINT,
  `sourceType` VARCHAR(50) NULL DEFAULT NULL,
  `title` VARCHAR(1024) NOT NULL,
  `descritpion` VARCHAR(2048) NULL DEFAULT NULL,
  `type` SMALLINT(6) NOT NULL DEFAULT 0,
  `url` VARCHAR(1024) NULL DEFAULT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 0,
  `system` TINYINT(1) NOT NULL DEFAULT 0,
  `reminderCount` SMALLINT(6) NOT NULL DEFAULT 0,
  `reminderInterval` SMALLINT(6) NOT NULL DEFAULT 0,
  `reminderUnit` SMALLINT(6) NOT NULL DEFAULT 0,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME NULL DEFAULT NULL,
  `scheduledAt` DATETIME NULL DEFAULT NULL,
  `triggeredAt` DATETIME NULL DEFAULT NULL,
  `content` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_event_user` (`userId` ASC),
  CONSTRAINT `fk_event_user`
    FOREIGN KEY (`userId`)
    REFERENCES `nugfhltmhosting_booking`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- Event Template Table
CREATE TABLE `nugfhltmhosting_booking`.`event_template` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(100) NOT NULL,
  `description` VARCHAR(2048) NULL DEFAULT NULL,
  `type` SMALLINT(6) NOT NULL DEFAULT 0,
  `sourceType` VARCHAR(50) NULL DEFAULT NULL,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME NULL DEFAULT NULL,
  `content` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`) );


-- Reminder Table
CREATE TABLE `nugfhltmhosting_booking`.`reminder` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `eventId` BIGINT NOT NULL,
  `userId` BIGINT NOT NULL,
  `read` TINYINT(1) NOT NULL DEFAULT 1,
  `trash` TINYINT(1) NOT NULL DEFAULT 1,
  `createdAt` DATETIME NOT NULL,
  `updatedAt` DATETIME NULL DEFAULT NULL,
  `content` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_reminder_event` (`eventId` ASC),
  CONSTRAINT `fk_reminder_event`
    FOREIGN KEY (`eventId`)
    REFERENCES `nugfhltmhosting_booking`.`event` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

ALTER TABLE `nugfhltmhosting_booking`.`reminder` 
ADD INDEX `idx_reminder_user` (`userId` ASC);
ALTER TABLE `nugfhltmhosting_booking`.`reminder` 
ADD CONSTRAINT `fk_reminder_user`
  FOREIGN KEY (`userId`)
  REFERENCES `nugfhltmhosting_booking`.`user` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;


