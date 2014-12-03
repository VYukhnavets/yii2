<?php

use yii\db\Schema;
use yii\db\Migration;

class m141203_123218_init_db extends Migration
{
    public function up()
    {
        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%cs_messages}} (
              `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
              `app_id` int(11) NOT NULL,
              `message` text,
              `createtime` int(11) unsigned NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%help}} (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `alias` varchar(255) NOT NULL,
              `title` varchar(255) NOT NULL,
              `content` text,
              `createtime` int(11) NOT NULL,
              `updatetime` int(11) NOT NULL,
              `published` tinyint(1) NOT NULL,
              PRIMARY KEY (`id`),
              UNIQUE KEY `alias` (`alias`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;')->execute();

        $this->db->createCommand('CREATE TABLE IF NOT EXISTS {{%merchant_users}} (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `app_id` int(11) NOT NULL,
              `first_name` varchar(50) NOT NULL,
              `last_name` varchar(50) NOT NULL,
              `email` varchar(50) NOT NULL,
              `password` varchar(50) NOT NULL,
              `status` tinyint(1) NOT NULL,
              `createtime` int(11) NOT NULL,
              `updatetime` int(11) NOT NULL,
              `lastvisit` int(11) NOT NULL,
              `sess_id` varchar(50) NOT NULL,
              `activation_key` varchar(50) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;')->execute();
        
    }

    public function down()
    {
        echo "Empty revert. No changes were made\n";

        return true;
    }
}
