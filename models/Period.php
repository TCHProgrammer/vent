<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "period".
 *
 * @property int $id
 * @property string $name
 * @property string $symbole_code
 * @property int $priority
 *
 * @property Works[] $works
 */
class Period extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'period';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priority'], 'integer'],
            [['name'], 'string', 'max' => 256],
            [['symbole_code'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'symbole_code' => 'Symbole Code',
            'priority' => 'Priority',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Works::className(), ['period_id' => 'id']);
    }
}
