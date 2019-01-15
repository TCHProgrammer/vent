<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "worker_types".
 *
 * @property int $id
 * @property string $name
 * @property string $symbole_code
 * @property int $priority
 *
 * @property Works[] $works
 */
class WorkerTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'worker_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['priority'], 'integer'],
            [['name'], 'string', 'max' => 256],
            [['symbole_code'], 'string', 'max' => 64],
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
        return $this->hasMany(Works::className(), ['worker_types_id' => 'id']);
    }
}
