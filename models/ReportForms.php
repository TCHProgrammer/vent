<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report_forms".
 *
 * @property int $id
 * @property string $name
 * @property string $symbole_code
 * @property int $priority
 *
 * @property Works[] $works
 */
class ReportForms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report_forms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priority'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['symbole_code'], 'string', 'max' => 256],
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
        return $this->hasMany(Works::className(), ['report_forms_id' => 'id']);
    }
}
