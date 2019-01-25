<?php

namespace app\controllers;


use Yii;
use app\models\Categories;
use app\models\Brands;
use app\models\Works;
use app\models\WorkTypes;
use app\models\WorkerTypes;
use app\models\WorkContents;
use app\models\ReportForms;
use app\models\Period;


class WorksController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionGetworkinfo($id=null){

        $result = array();

        $categories = Categories::find()->orderBy('name')->asArray()->all();

        $brands = Brands::find()->orderBy('name')->asArray()->all();

        $work_types = WorkTypes::find()->orderBy('name')->asArray()->all();

        $worker_types = WorkerTypes::find()->orderBy('name')->asArray()->all();

        $periods = Period::find()->orderBy('priority')->asArray()->all();

        $report_forms = ReportForms::find()->orderBy('priority')->asArray()->all();


        $result['categories_list'] = $categories;

        $result['brands_list'] = $brands;

        $result['work_types_list'] = $work_types;

        $result['worker_types_list'] = $worker_types;

        $result['periods_list'] = $periods;

        $result['report_forms_list'] = $report_forms;


        if($id){
            $model = Works::findOne($id);

            if($model){
                $fields = $model->attributes();

                //var_dump();



                foreach($fields as $field){
                    $result[$field] = $model[$field];
                }

                $work_contents = WorkContents::find()->where(array('works_id'=>$model->id))->orderBy('name')->asArray()->all();

                $result['work_contents'] = $work_contents;


            } else {

            }
        } else {

        }


        return json_encode($result);

    }


    public function actionUpdate(){
        $result = array();
        $result['POST'] = Yii::$app->request->post();
        $result['FILES'] = $_FILES;

        return json_encode($result);
    }



}
