<?php

use yii\db\Schema;
use yii\db\Migration;

class m141204_070033_recreate_logger_table extends Migration
{
    public function up()
    {
        $this->dropTable('{{%logger}}');
        $this->db->createCommand('CREATE TABLE tbl_logger(
            id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            level INTEGER,
            category VARCHAR( 255 ) ,
            log_time INTEGER,
            prefix TEXT,
            message TEXT,
            INDEX idx_log_level( level ) ,
            INDEX idx_log_category( category ))
            ENGINE = InnoDB;')->execute();
    }

    public function down()
    {
        echo "Empty revert. No changes were made\n";

        return true;
    }
}
