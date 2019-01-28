<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_contents_photo".
 *
 * @property int $id
 * @property int $work_contents_id
 * @property string $file_name
 *
 * @property WorkContents $workContents
 */
class WorkContentsPhoto extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_contents_photo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['work_contents_id'], 'integer'],
            [['file_name'], 'string', 'max' => 256],
            [['work_contents_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkContents::className(), 'targetAttribute' => ['work_contents_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'work_contents_id' => 'Work Contents ID',
            'file_name' => 'File Name',
        ];
    }

    public function beforeDelete(){
        if(parent::beforeDelete()){

            $file_path = $_SERVER['DOCUMENT_ROOT'].'/upload/composition_images/'.$this->file_name;

            if(file_exists($file_path)){
                unlink($file_path);
            }

            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkContents()
    {
        return $this->hasOne(WorkContents::className(), ['id' => 'work_contents_id']);
    }
}
