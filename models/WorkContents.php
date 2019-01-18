<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_contents".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $works_id
 *
 * @property Works $works
 */
class WorkContents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_contents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['works_id'], 'required'],
            [['works_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['works_id'], 'exist', 'skipOnError' => true, 'targetClass' => Works::className(), 'targetAttribute' => ['works_id' => 'id']],
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
            'description' => 'Description',
            'works_id' => 'Works ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasOne(Works::className(), ['id' => 'works_id']);
    }
}
