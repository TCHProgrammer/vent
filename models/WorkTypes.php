<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_types".
 *
 * @property int $id
 * @property string $name
 * @property string $symbole_code
 * @property int $priority
 */
class WorkTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priority'], 'integer'],
            [['name', 'symbole_code'], 'string', 'max' => 256],
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
}
