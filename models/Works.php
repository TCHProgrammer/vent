<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "works".
 *
 * @property int $id
 * @property string $name
 * @property int $brands_id
 * @property int $worker_types_id
 * @property int $work_types_id
 * @property int $period_id
 * @property int $execution_time
 * @property int $report_forms_id
 *
 * @property WorkContents[] $workContents
 * @property Brands $brands
 * @property Period $period
 * @property ReportForms $reportForms
 * @property WorkerTypes $workerTypes
 */


use app\models\Categories;
use app\models\Brands;
use app\models\WorkTypes;
use app\models\WorkerTypes;
use app\models\WorkContents;
use app\models\ReportForms;
use app\models\Period;



class Works extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'works';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['brands_id', 'worker_types_id', 'work_types_id', 'period_id', 'report_forms_id'], 'required'],
            [['brands_id', 'worker_types_id', 'work_types_id', 'period_id', 'execution_time', 'report_forms_id'], 'integer'],
            [['name'], 'string', 'max' => 512],
            [['brands_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brands_id' => 'id']],
            [['period_id'], 'exist', 'skipOnError' => true, 'targetClass' => Period::className(), 'targetAttribute' => ['period_id' => 'id']],
            [['report_forms_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReportForms::className(), 'targetAttribute' => ['report_forms_id' => 'id']],
            [['worker_types_id'], 'exist', 'skipOnError' => true, 'targetClass' => WorkerTypes::className(), 'targetAttribute' => ['worker_types_id' => 'id']],
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
            'brands_id' => 'Brands ID',
            'worker_types_id' => 'Worker Types ID',
            'work_types_id' => 'Work Types ID',
            'period_id' => 'Period ID',
            'execution_time' => 'Execution Time',
            'report_forms_id' => 'Report Forms ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkContents()
    {
        return $this->hasMany(WorkContents::className(), ['works_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrands()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brands_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriod()
    {
        return $this->hasOne(Period::className(), ['id' => 'period_id']);
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
    public function getWorkerTypes()
    {
        return $this->hasOne(WorkerTypes::className(), ['id' => 'worker_types_id']);
    }

    public function getWorksMapByBrandId($brand_id){

        $brand = Brands::findOne($brand_id);

        if($brand){
            $allworks = $brand->works;

            $worker_types = WorkerTypes::find()->orderBy('priority')->all();


            $work_types = WorkTypes::find()->orderBy('priority')->all();

            $result = array();

            foreach($worker_types as $worker_type){

                $result[$worker_type->id] = array();

                foreach($work_types as $work_type){
                    $result[$worker_type->id][$work_type->id] = $brand->getWorksByTypes($worker_type->id,$work_type->id);
                }
            }



        } else {
            return json_encode(array());
        }


        return $result;

    }
}
