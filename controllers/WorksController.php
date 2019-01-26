<?php

namespace app\controllers;


use Yii;
use app\models\Categories;
use app\models\Brands;
use app\models\Works;
use app\models\WorkTypes;
use app\models\WorkerTypes;
use app\models\WorkContents;
use app\models\WorkContentsPhoto;
use app\models\ReportForms;
use app\models\WorkReportForms;
use app\models\WorkReportFormFields;
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

    private function newWorkDataUpdate($id){
        foreach(Yii::$app->request->post()['work_contents_to_add_name'] as $k=>$wk_name){
            $wk = new WorkContents();
            $wk->name = $wk_name;
            $wk->description = Yii::$app->request->post()['work_contents_to_add_description'][$k];
            $wk->works_id = $id;

            if($wk->save()){
                $work_contents_id = $wk->id;

                if(isset($_FILES['work_contents_image']['tmp_name'][$k])) {
                    $tmp_files = $_FILES['work_contents_image']['tmp_name'][$k];
                } else {
                    $tmp_files = array();
                }

                if(isset($_FILES['work_contents_image']['name'][$k])) {
                    $file_names = $_FILES['work_contents_image']['name'][$k];
                } else {
                    $file_names = array();
                }

                $file_extensions = array();

                foreach($file_names as $file_name){
                    $exp = explode('.',$file_name);

                    $file_extensions[] = array_pop($exp);
                }

                $file_names_to_replace = array();


                foreach($file_extensions as $file_extension){
                    $file_names_to_replace[] = md5(time().rand().rand()).'.'.$file_extension;
                }

                foreach($tmp_files as $ktf=>$tmp_file){
                    rename($tmp_file,$_SERVER['DOCUMENT_ROOT'].'/'.'upload/composition_images/'.$file_names_to_replace[$ktf]);
                    $work_contents_photo = new WorkContentsPhoto();
                    $work_contents_photo->work_contents_id = $work_contents_id;
                    $work_contents_photo->file_name = $file_names_to_replace[$ktf];

                    $work_contents_photo->save();
                }




            }

            foreach(Yii::$app->request->post()['checked_report_forms'] as $crf){
                $wrf = new WorkReportForms();
                $wrf->report_forms_id = $crf;
                $wrf->works_id = $id;
                if($wrf->save()){
                    $work_report_forms_id = $wrf->id;
                    if(isset(Yii::$app->request->post()['report_form_fields'][$crf])){
                        foreach(Yii::$app->request->post()['report_form_fields'][$crf] as $work_report_form_fields_name){
                            $work_report_form_field = new WorkReportFormFields();
                            $work_report_form_field->work_report_forms_id = $work_report_forms_id;
                            $work_report_form_field->name = $work_report_form_fields_name;
                            $work_report_form_field->save();
                        }
                    }
                }
            }


        }
    }

    /**
     * @param null $id
     * @param null $brand_id
     * @return string
     */
    public function actionUpdate($id=null, $brands_id=null){

        if(!$id){
            $model = new Works();
            $fields = $model->attributes();
            foreach($fields as $field){
                $model[$field] = Yii::$app->request->post()[$field];
            }

            if($model->save()){
                $id = $model->id;
                $this->newWorkDataUpdate($id);
            }
        }

        /*
        $result = array();
        $result['POST'] = Yii::$app->request->post();
        $result['FILES'] = $_FILES;

        return json_encode($result);
        */
        if($brands_id){
            return $this->redirect('/works?brands_id='.$brands_id);
        } else {
            return $this->redirect(['index']);
        }
    }



}
