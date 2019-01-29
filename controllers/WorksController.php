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

        if(!isset($_GET['brands_id'])){
            $brands = Brands::find()->orderBy('id')->limit(1,1)->all();
            if(count($brands)){
                $brands_id = $brands[0]->id;

                if($brands_id){
                    return $this->redirect('/works?brands_id='.$brands_id);
                } else {
                    return $this->redirect(['/works']);
                }
            }
        }



        return $this->render('index');
    }

    public function actionGetworkinfo($id=null){

        $result = array();

        //$categories = Categories::find()->orderBy('name')->asArray()->all();

        //$brands = Brands::find()->orderBy('name')->asArray()->all();

        //$work_types = WorkTypes::find()->orderBy('name')->asArray()->all();

        //$worker_types = WorkerTypes::find()->orderBy('name')->asArray()->all();

        //$periods = Period::find()->orderBy('priority')->asArray()->all();

        //$report_forms = ReportForms::find()->orderBy('priority')->asArray()->all();


        //$result['categories_list'] = $categories;

        //$result['brands_list'] = $brands;

        //$result['work_types_list'] = $work_types;

        //$result['worker_types_list'] = $worker_types;

        //$result['periods_list'] = $periods;

        //$result['report_forms_list'] = $report_forms;


        if($id){
            $model = Works::findOne($id);

            if($model){
                $fields = $model->attributes();

                //var_dump();



                foreach($fields as $field){
                    $result[$field] = $model[$field];
                }

                $brand = Brands::findOne($model->brands_id);

                $result['categories_id'] = $brand->category_id;


                $work_contents = WorkContents::find()->where(array('works_id'=>$model->id))->orderBy(array('id'=>SORT_DESC))->asArray()->all();

                $result['work_contents'] = $work_contents;

                $work_report_forms = WorkReportForms::find()->where(array('works_id'=>$model->id))->asArray()->all();

                $result['work_report_forms'] = $work_report_forms;

                $work_report_form_fields = array();
                foreach($work_report_forms as $work_report_form){
                    $wrff = WorkReportFormFields::find()->where(array('work_report_forms_id'=>$work_report_form['id']))->asArray()->all();
                    $work_report_form_fields[$work_report_form['id']] = $wrff;
                }

                $result['work_report_form_fields'] = $work_report_form_fields;


                $work_contents_photo = array();


                foreach($work_contents as $work_content){
                    $wcp = WorkContentsPhoto::find()->where(array('work_contents_id'=>$work_content['id']))->asArray()->all();
                    $work_contents_photo[$work_content['id']] = $wcp;
                }

                $result['work_contents_photo'] = $work_contents_photo;


            } else {

            }
        } else {

        }


        return json_encode($result);

    }

    private function workContentsToAdd($id){
        if(isset(Yii::$app->request->post()['work_contents_to_add_name'])) {
            foreach (Yii::$app->request->post()['work_contents_to_add_name'] as $k => $wk_name) {
                $wk = new WorkContents();
                $wk->name = $wk_name;
                $wk->description = Yii::$app->request->post()['work_contents_to_add_description'][$k];
                $wk->works_id = $id;
                $wk->save();
            }
        }
    }

    private function lastWorkContentsPhotoToAdd($id){
        $work = Works::findOne($id);
        $work_contents = $work->workContents;

        foreach($work_contents as $work_content){
            foreach ($work_contents as $wk) {




                $work_contents_id = $wk->id;
                $k = $work_contents_id;


                if (isset($_FILES['last_work_contents_image_to_add']['tmp_name'][$k])) {
                    $tmp_files = $_FILES['last_work_contents_image_to_add']['tmp_name'][$k];
                } else {
                    $tmp_files = array();
                }

                if (isset($_FILES['last_work_contents_image_to_add']['name'][$k])) {
                    $file_names = $_FILES['last_work_contents_image_to_add']['name'][$k];
                } else {
                    $file_names = array();
                }

                $file_extensions = array();

                foreach ($file_names as $file_name) {
                    $exp = explode('.', $file_name);

                    $file_extensions[] = array_pop($exp);
                }

                $file_names_to_replace = array();


                foreach ($file_extensions as $file_extension) {
                    $file_names_to_replace[] = md5(time() . rand() . rand()) . '.' . $file_extension;
                }


                //var_dump('lastWorkContentsPhotoToAdd');

                //var_dump($tmp_files);

                foreach ($tmp_files as $ktf => $tmp_file) {
                    if(file_exists($tmp_file)) {
                        rename($tmp_file, $_SERVER['DOCUMENT_ROOT'] . '/' . 'upload/composition_images/' . $file_names_to_replace[$ktf]);

                        $work_contents_photo = new WorkContentsPhoto();
                        $work_contents_photo->work_contents_id = $work_contents_id;
                        $work_contents_photo->file_name = $file_names_to_replace[$ktf];

                        $work_contents_photo->save();
                    }
                }





            }
        }


    }

    private function lastWorkContentsAndPhotosAvailable($id){

        $work = Works::findOne($id);

        $work_contents_in_db = $work->workContents;

        if(isset(Yii::$app->request->post()['work_contents_already_exists_name'])){
            $work_contents = array_keys(Yii::$app->request->post()['work_contents_already_exists_name']);
        } else {
            $work_contents = array();
        }

        foreach($work_contents_in_db as $wk_item){
            if(!in_array($wk_item->id, $work_contents)){
                $wk_item->delete();
            } else {
                if(isset(Yii::$app->request->post()['work_contents_already_exists_name'][$wk_item->id])) {

                    $wk_item->name = Yii::$app->request->post()['work_contents_already_exists_name'][$wk_item->id];
                    $wk_item->description = Yii::$app->request->post()['work_contents_already_exists_description'][$wk_item->id];
                    if ($wk_item->save()) {

                        if (isset(Yii::$app->request->post()['work_contents_photo_id'][$wk_item->id])) {
                            $photos = Yii::$app->request->post()['work_contents_photo_id'][$wk_item->id];
                        } else {
                            $photos = array();
                        }


                        $photos_db = $wk_item->workContentsPhoto;

                        foreach ($photos_db as $photo) {
                            if (!in_array($photo->id, $photos)) {
                                $photo->delete();
                            }
                        }


                    }
                }
            }
        }

    }


    private function newWorkContentsWithPhotosToAdd($id){

        if(isset(Yii::$app->request->post()['work_contents_to_add_name'])) {

            foreach (Yii::$app->request->post()['work_contents_to_add_name'] as $k => $wk_name) {
                $wk = new WorkContents();
                $wk->name = $wk_name;
                $wk->description = Yii::$app->request->post()['work_contents_to_add_description'][$k];
                $wk->works_id = $id;

                if ($wk->save()) {
                    $work_contents_id = $wk->id;

                    if (isset($_FILES['new_work_contents_image_to_add']['tmp_name'][$k])) {
                        $tmp_files = $_FILES['new_work_contents_image_to_add']['tmp_name'][$k];
                    } else {
                        $tmp_files = array();
                    }

                    if (isset($_FILES['new_work_contents_image_to_add']['name'][$k])) {
                        $file_names = $_FILES['new_work_contents_image_to_add']['name'][$k];
                    } else {
                        $file_names = array();
                    }

                    $file_extensions = array();

                    foreach ($file_names as $file_name) {
                        $exp = explode('.', $file_name);

                        $file_extensions[] = array_pop($exp);
                    }

                    $file_names_to_replace = array();


                    foreach ($file_extensions as $file_extension) {
                        $file_names_to_replace[] = md5(time() . rand() . rand()) . '.' . $file_extension;
                    }

                    //var_dump('newWorkContentsWithPhotosToAdd');

                    //var_dump($tmp_files);

                    foreach ($tmp_files as $ktf => $tmp_file) {
                        if(file_exists($tmp_file)) {
                            rename($tmp_file, $_SERVER['DOCUMENT_ROOT'] . '/' . 'upload/composition_images/' . $file_names_to_replace[$ktf]);

                            $work_contents_photo = new WorkContentsPhoto();
                            $work_contents_photo->work_contents_id = $work_contents_id;
                            $work_contents_photo->file_name = $file_names_to_replace[$ktf];

                            $work_contents_photo->save();
                        }
                    }


                }


            }

        }


    }


    private function setCheckedReportFormsWithFields($id){

        $work = Works::findOne($id);

        $work_report_forms_in_db = $work->workReportForms;


        foreach($work_report_forms_in_db as $item_to_delete){
            $item_to_delete->delete();
        }

        if(isset(Yii::$app->request->post()['checked_report_forms'])) {
            $report_forms = array_unique(Yii::$app->request->post()['checked_report_forms']);
        } else {
            $report_forms = array();
        }


        foreach($report_forms as $report_form_id){
            $work_report_form = new WorkReportForms();
            $work_report_form->works_id = $work->id;
            $work_report_form->report_forms_id = $report_form_id;

            if($work_report_form->save()) {

                if(isset(Yii::$app->request->post()['report_form_fields'][$report_form_id])) {
                    foreach(Yii::$app->request->post()['report_form_fields'][$report_form_id] as $form_fields_name){
                        $work_report_form_field = new WorkReportFormFields();
                        $work_report_form_field->name = $form_fields_name;
                        $work_report_form_field->work_report_forms_id = $work_report_form->id;
                        $work_report_form_field->save();
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

            unset($fields['id']);

            foreach($fields as $field){
                $model[$field] = Yii::$app->request->post()[$field];
            }

            if($model->save()){
                $id = $model->id;
            }

        } else {

            $model = Works::findOne($id);
            $fields = $model->attributes();
            foreach($fields as $field){
                $model[$field] = Yii::$app->request->post()[$field];
            }

            $model->id = $id;

            if($model->save()){

            } else {
                $id = null;
            }

        }


        if($id){
            $this->lastWorkContentsAndPhotosAvailable($id);
            $this->lastWorkContentsPhotoToAdd($id);
            $this->newWorkContentsWithPhotosToAdd($id);
            $this->setCheckedReportFormsWithFields($id);
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
            return $this->redirect(['/works']);
        }


    }

    public function actionDelete($id){
        $model = Works::findOne($id);

        if($model) {
            $model->delete();
        }
    }



}
