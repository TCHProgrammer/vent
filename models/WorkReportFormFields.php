<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_report_form_fields".
 *
 * @property int $id
 * @property int $work_report_forms_id
 * @property string $name
 *
 * @property WorkReportForms $workReportForms
 */
class WorkReportFormFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_report_form_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['work_report_forms_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['work_report_forms_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkReportForms::className(), 'targetAttribute' => ['work_report_forms_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'work_report_forms_id' => 'Work Report Forms ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkReportForms()
    {
        return $this->hasOne(WorkReportForms::className(), ['id' => 'work_report_forms_id']);
    }
}
