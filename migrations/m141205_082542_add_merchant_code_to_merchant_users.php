<?php

use yii\db\Schema;
use yii\db\Migration;

class m141205_082542_add_merchant_code_to_merchant_users extends Migration
{
    public function up()
    {
        $this->addColumn('{{%merchant_users}}', 'merchant_code', "varchar(7)");
    }

    public function down()
    {
        $this->dropColumn('{{%merchant_users}}', 'merchant_code');
    }
}
