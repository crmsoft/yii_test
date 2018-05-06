<?php

namespace common\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    /**
     * validate post fields
     * @return array
     */
    public function rules()
    {
        return [
            // the asin is required field
            [['asin'],'required'],
            // price must be double
            [['price'],'double']
        ];
    }

    public function search(){

    }
}