<?php

use yii\db\Schema;
use yii\db\Migration;

class m141203_145258_add_states_values extends Migration
{
    public function up()
    {
        $this->db->createCommand("DELETE FROM {{%state}} WHERE 1;")->execute();
        $this->db->createCommand("INSERT INTO {{%state}} (`id`, `code`, `name`) VALUES
            (1, 'AL', 'Alabama'),
            (2, 'AK', 'Alaska'),
            (3, 'AZ', 'Arizona'),
            (4, 'AR', 'Arkansas'),
            (5, 'CA', 'California'),
            (6, 'CO', 'Colorado'),
            (7, 'CT', 'Connecticut'),
            (8, 'DE', 'Delaware'),
            (9, 'FL', 'Florida'),
            (10, 'GA', 'Georgia'),
            (12, 'HI', 'Hawaii'),
            (13, 'ID', 'Idaho'),
            (14, 'IL', 'Illinois'),
            (15, 'IN', 'Indiana'),
            (16, 'IA', 'Iowa'),
            (17, 'KS', 'Kansas'),
            (18, 'KY', 'Kentucky'),
            (19, 'LA', 'Louisiana'),
            (20, 'ME', 'Maine'),
            (21, 'MD', 'Maryland'),
            (22, 'MA', 'Massachusetts'),
            (23, 'MI', 'Michigan'),
            (24, 'MN', 'Minnesota'),
            (25, 'MS', 'Mississippi'),
            (26, 'MO', 'Missouri'),
            (27, 'MT', 'Montana'),
            (28, 'NE', 'Nebraska'),
            (29, 'NV', 'Nevada'),
            (30, 'NH', 'New Hampshire'),
            (31, 'NJ', 'New Jersey'),
            (32, 'NM', 'New Mexico'),
            (33, 'NY', 'New York'),
            (34, 'NC', 'North Carolina'),
            (35, 'ND', 'North Dakota'),
            (36, 'OH', 'Ohio'),
            (37, 'OK', 'Oklahoma'),
            (38, 'OR', 'Oregon'),
            (39, 'PA', 'Pennsylvania'),
            (40, 'RI', 'Rhode Island'),
            (41, 'SC', 'South Carolina'),
            (42, 'SD', 'South Dakota'),
            (43, 'TN', 'Tennessee'),
            (44, 'TX', 'Texas'),
            (45, 'UT', 'Utah'),
            (46, 'VT', 'Vermont'),
            (47, 'VA', 'Virginia'),
            (48, 'WA', 'Washington'),
            (49, 'WV', 'West Virginia'),
            (50, 'WI', 'Wisconsin'),
            (51, 'WY', 'Wyoming');")->execute();
    }

    public function down()
    {
        $this->db->createCommand("DELETE FROM {{%state}} WHERE 1;")->execute();

        return true;
    }
}