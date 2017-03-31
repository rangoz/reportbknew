<?php

namespace frontend\modules\inven\models;

use Yii;

/**
 * This is the model class for table "invendetails".
 *
 * @property integer $id
 * @property integer $main_id
 * @property integer $product_id
 * @property integer $qty
 * @property string $remark
 */
class Invendetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invendetails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_id', 'product_id', 'qty'], 'integer'],
            [['remark'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_id' => 'Main ID',
            'product_id' => 'รายการ',
            'qty' => 'จำนวน',
            'remark' => 'หมายเหตุ',
        ];
    }
}