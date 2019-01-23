<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_report_forms".
 *
 * @property int $id
 * @property int $works_id
 * @property int $report_forms_id
 *
 * @property ReportForms $reportForms
 * @property Works $works
 */
class WorkReportForms extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'work_report_forms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['works_id', 'report_forms_id'], 'integer'],
            [['report_forms_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReportForms::className(), 'targetAttribute' => ['report_forms_id' => 'id']],
            [['works_id'], 'exist', 'skipOnError' => true, 'targetClass' => Works::className(), 'targetAttribute' => ['works_id' => 'id']],
        ];
    }

    public function beforeDelete()
    {

        if(parent::beforeDelete()){
            $report_form_fields = $this->reportformfields;

            foreach($report_form_fields as $item){
                $item->delete();
            }

            return true;
        } else {
            return false;
        }

    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'works_id' => 'Works ID',
            'report_forms_id' => 'Report Forms ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportForms()
    {
        return $this->hasOne(ReportForms::className(), ['id' => 'report_forms_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasOne(Works::className(), ['id' => 'works_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReportFormFields()
    {
        return $this->hasMany(WorkReportFormFields::className(), ['work_report_forms_id' => 'id']);
    }
}
