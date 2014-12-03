<?php

use yii\db\Schema;
use yii\db\Migration;

class m141203_135820_add_more_tables extends Migration
{
    public function up()
    {
        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%application}} (
            `id` INT(11) UNSIGNED NOT NULL,
            `name` VARCHAR(45) NOT NULL,
            `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `createtime` INT(11) UNSIGNED NOT NULL,
            PRIMARY KEY (`id`))
          ENGINE = InnoDB;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%application_settings}} (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `app_id` INT(11) UNSIGNED NOT NULL,
            `key` VARCHAR(255) NOT NULL,
            `value` VARCHAR(512) NULL,
            PRIMARY KEY (`id`),
            CONSTRAINT `app_id_settings_key`
              FOREIGN KEY (`app_id`)
              REFERENCES {{%application}} (`id`)
              ON DELETE CASCADE
              ON UPDATE NO ACTION)
          ENGINE = InnoDB;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%application_module}} (
            `app_id` INT(11) UNSIGNED NOT NULL,
            `call_center` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `call_center_admin` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `call_center_order_manager` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `loyalty_iphone` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `loyalty_android` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `loyalty_web` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `mobile_ordering_iphone` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `mobile_ordering_android` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `web_ordering` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `pos_positouch` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `pos_micros` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `merchant_admin` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            `reports` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
            INDEX `fk_tbl_application_module_tbl_application1_idx` (`app_id` ASC),
            PRIMARY KEY (`app_id`),
            CONSTRAINT `fk_tbl_application_module_tbl_application1`
              FOREIGN KEY (`app_id`)
              REFERENCES {{%application}} (`id`)
              ON DELETE NO ACTION
              ON UPDATE NO ACTION)
          ENGINE = InnoDB;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%cs_employees}} (
            `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
            `username` VARCHAR(255) NOT NULL,
            `status` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
            `email` VARCHAR(255) NOT NULL,
            `social_security_number` VARCHAR(255) NULL,
            `birthday` INT UNSIGNED NOT NULL,
            `phone` VARCHAR(11) NULL,
            `phone_ext` VARCHAR(10) NULL,
            `createtime` INT UNSIGNED NOT NULL,
            `updatetime` INT UNSIGNED NOT NULL,
            PRIMARY KEY (`id`))
          ENGINE = InnoDB;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%logger}} (
            `id` INT(11) UNSIGNED NOT NULL,
            `level` VARCHAR(128) NOT NULL,
            `category` VARCHAR(128) NOT NULL,
            `logtime` INT(11) NOT NULL,
            `message` TEXT NOT NULL,
            PRIMARY KEY (`id`))
          ENGINE = InnoDB;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%help}} (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `alias` VARCHAR(255) NOT NULL,
            `title` VARCHAR(255) NOT NULL,
            `content` TEXT NULL,
            `createtime` INT(11) NOT NULL,
            `updatetime` INT(11) NOT NULL,
            `published` TINYINT(1) NOT NULL,
            PRIMARY KEY (`id`),
            UNIQUE INDEX `alias_UNIQUE` (`alias` ASC))
          ENGINE = InnoDB;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%merchant_users}} (
            `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
            `app_id` INT(11) UNSIGNED NOT NULL,
            `first_name` VARCHAR(50) NOT NULL,
            `last_name` VARCHAR(50) NOT NULL,
            `email` VARCHAR(50) NOT NULL,
            `password` VARCHAR(50) NOT NULL,
            `status` TINYINT(1) UNSIGNED NOT NULL,
            `createtime` INT(11) UNSIGNED NOT NULL,
            `updatetime` INT(11) UNSIGNED NOT NULL,
            `lastvisit` INT(11) UNSIGNED NOT NULL,
            `sess_id` VARCHAR(50) NOT NULL,
            `activation_key` VARCHAR(50) NOT NULL,
            PRIMARY KEY (`id`),
            INDEX `app_id_musers_key_idx` (`app_id` ASC),
            CONSTRAINT `app_id_musers_key`
              FOREIGN KEY (`app_id`)
              REFERENCES {{%application}} (`id`)
              ON DELETE CASCADE
              ON UPDATE NO ACTION)
          ENGINE = InnoDB;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%cs_messages}} (
            `id` INT(11) UNSIGNED NOT NULL,
            `app_id` INT(11) UNSIGNED NOT NULL,
            `message` TEXT NULL,
            `createtime` INT(11) UNSIGNED NOT NULL,
            PRIMARY KEY (`id`),
            INDEX `app_id_messages_key_idx` (`app_id` ASC),
            CONSTRAINT `app_id_messages_key`
              FOREIGN KEY (`app_id`)
              REFERENCES {{%application}} (`id`)
              ON DELETE CASCADE
              ON UPDATE NO ACTION)
          ENGINE = InnoDB;')->execute();


        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%state}} (
            `id` TINYINT(3) UNSIGNED NOT NULL,
            `code` VARCHAR(2) NOT NULL,
            `name` VARCHAR(45) NULL,
            PRIMARY KEY (`id`))
          ENGINE = InnoDB;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%application_profile}} (
            `app_id` INT(11) UNSIGNED NOT NULL,
            `address_street1` VARCHAR(255) NOT NULL,
            `address_street2` VARCHAR(255) NULL,
            `city` VARCHAR(255) NOT NULL,
            `state_id` TINYINT(3) UNSIGNED NOT NULL,
            `zip` VARCHAR(10) NOT NULL,
            `zip2` VARCHAR(10) NULL,
            `email` VARCHAR(255) NOT NULL,
            `website` VARCHAR(255) NOT NULL,
            `phone` VARCHAR(11) NOT NULL,
            `phone_ext` VARCHAR(10) NULL,
            `fax` VARCHAR(11) NULL,
            `fax_ext` VARCHAR(10) NULL,
            PRIMARY KEY (`app_id`),
            INDEX `state_index_idx` (`state_id` ASC),
            CONSTRAINT `app_id_profile_key`
              FOREIGN KEY (`app_id`)
              REFERENCES {{%application}} (`id`)
              ON DELETE CASCADE
              ON UPDATE NO ACTION,
            CONSTRAINT `state_index`
              FOREIGN KEY (`state_id`)
              REFERENCES {{%state}} (`id`)
              ON DELETE NO ACTION
              ON UPDATE NO ACTION)
          ENGINE = InnoDB;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%merchant_primary_contact}} (
            `app_id` INT(11) UNSIGNED NOT NULL,
            `first_name` VARCHAR(255) NOT NULL,
            `last_name` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `phone` VARCHAR(11) NOT NULL,
            `phone_ext` VARCHAR(10) NULL,
            PRIMARY KEY (`app_id`),
            CONSTRAINT `app_id_prim_contact_key`
              FOREIGN KEY (`app_id`)
              REFERENCES {{%application}} (`id`)
              ON DELETE CASCADE
              ON UPDATE NO ACTION)
          ENGINE = InnoDB;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%merchant_secondary_contact}} (
            `app_id` INT(11) UNSIGNED NOT NULL,
            `first_name` VARCHAR(255) NOT NULL,
            `last_name` VARCHAR(255) NOT NULL,
            `email` VARCHAR(255) NOT NULL,
            `phone` VARCHAR(11) NOT NULL,
            `phone_ext` VARCHAR(10) NULL,
            PRIMARY KEY (`app_id`),
            CONSTRAINT `app_id_prim_contact_key0`
              FOREIGN KEY (`app_id`)
              REFERENCES {{%application}} (`id`)
              ON DELETE CASCADE
              ON UPDATE NO ACTION)
          ENGINE = InnoDB;')->execute();
        
        $this->db->createCommand('CREATE  OR REPLACE VIEW `merchant_account`
            AS SELECT a.id app_id, a.name app_name,  a.status app_status,
            a.createtime app_createtime, p.address_street1 address_street1, p.address_street2 address_street2,
            p.city city, s.code state, p.zip zip, p.zip2 zip2, p.email email, p.website website, 
            p.phone phone, p.phone_ext phone_ext, p.fax fax, p.fax_ext fax_ext, 
            pc.first_name pc_first_name, pc.last_name pc_last_name, pc.email pc_email, 
            pc.phone pc_phone, pc.phone_ext pc_phone_ext, 
            sc.first_name sc_first_name, sc.last_name sc_last_name, sc.email sc_email, 
            sc.phone sc_phone, sc.phone_ext sc_phone_ext
            FROM tbl_application a, tbl_application_profile p, tbl_state s, tbl_merchant_primary_contact pc, 
            tbl_merchant_secondary_contact sc;')->execute();
    }

    public function down()
    {
        echo "Empty revert. No changes were made\n";

        return true;
    }
}
