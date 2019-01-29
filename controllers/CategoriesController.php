<?php

namespace app\controllers;

use Yii;
use app\models\WorkReportFormFields;
use app\models\WorkReportForms;
use app\models\Works;
use app\models\WorkTypes;
use app\models\WorkerTypes;
use app\models\WorkContents;
use app\models\WorkContentsPhoto;
use app\models\Categories;
use app\models\Brands;
use app\models\CategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Categories();
		if(isset(Yii::$app->request->post()["name"])){
			$model->name = Yii::$app->request->post()["name"];
			
			if ($model->save()) {
				
				
				echo Yii::$app->request->post()["brand_name"];

                $brand_model = new Brands();
				if(isset(Yii::$app->request->post()["brand_name"]) && Yii::$app->request->post()["brand_name"] && trim(Yii::$app->request->post()["brand_name"]) != ''){
					//$brand_model = new Brands();
					$brand_model->name = Yii::$app->request->post()["brand_name"];
					$brand_model->category_id = $model->id;
					
					$brand_saved = $brand_model->save();
				} else {
					$brand_saved = true;
				}
				
				$brand_status = $brand_saved?'ok':'error';
				
				return json_encode(array('status'=>'ok','brand_status'=>$brand_status,'errors'=>$brand_model->getErrors(),'post'=>Yii::$app->request->post()["brand_name"]));//$this->redirect(['view', 'id' => $model->id]);
			} else {
				return json_encode(array('status'=>'error','errors'=>$model->getErrors()));
			}
			
		} else {
			return json_encode(array('status'=>'error','errors'=>$model->getErrors()));
		}
        
		
        
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(isset(Yii::$app->request->post()["name"])){
			$model->name = Yii::$app->request->post()["name"];
			
			if ($model->save()) {
				if(isset(Yii::$app->request->post()["brand_name"]) && Yii::$app->request->post()["brand_name"] && trim(Yii::$app->request->post()["brand_name"]) != ''){
					
					if(isset(Yii::$app->request->post()["brand_id"]) && (int)Yii::$app->request->post()["brand_id"]){
					
						$brand_model = Brands::findOne((int)Yii::$app->request->post()["brand_id"]);
						
						
						
						$brand_model->name = Yii::$app->request->post()["brand_name"];
						$brand_model->category_id = $model->id;
					
						$brand_saved = $brand_model->save();
					
					}
				} else {
					$brand_saved = true;
				}
				
				$brand_status = $brand_saved?'ok':'error';
				
				return json_encode(array('status'=>'ok','brand_status'=>$brand_status,'errors'=>$brand_model->getErrors()));
			} else {
				return json_encode(array('status'=>'error','errors'=>$model->getErrors()));
			}
			
		} else {
			return json_encode(array('status'=>'error','errors'=>$model->getErrors()));
		}
    }


    public function actionAddBrand($id)
    {
        $model = $this->findModel($id);

        if(!$model){
            return json_encode(array('status'=>'error'));
        }

        $brand_model = new Brands();
                if(isset(Yii::$app->request->post()["brand_name"]) && Yii::$app->request->post()["brand_name"] && trim(Yii::$app->request->post()["brand_name"]) != ''){







                        $brand_model->name = Yii::$app->request->post()["brand_name"];
                        $brand_model->category_id = $model->id;

                        $brand_saved = $brand_model->save();
                    if($brand_saved) {
                        if (isset(Yii::$app->request->post()["last_brand_id"]) && Yii::$app->request->post()["last_brand_id"] && trim(Yii::$app->request->post()["last_brand_id"]) != '') {

                            $last_brand = Brands::findOne(Yii::$app->request->post()["last_brand_id"]);

                            if ($last_brand) {
                                $last_brand_works = $last_brand->works;

                                foreach ($last_brand_works as $work_item) {

                                    $copied_work = new Works();

                                    $last_work_attributes = $work_item->attributes();

                                    unset($last_work_attributes['id']);

                                    foreach($last_work_attributes as $attribute_field){
                                        if($attribute_field == 'id'){
                                            continue;
                                        }
                                        $copied_work[$attribute_field] = $work_item[$attribute_field];
                                    }


                                    $copied_work->brands_id = $brand_model->id;


                                    if($copied_work->save()){

                                        $last_work_report_forms = $work_item->workReportForms;

                                        foreach($last_work_report_forms as $work_report_form_item){
                                            $copied_work_report_form = new WorkReportForms();
                                            $last_work_report_forms_attributes = $work_report_form_item->attributes();
                                            unset($last_work_report_forms_attributes['id']);

                                            foreach($last_work_report_forms_attributes as $attribute_field){

                                                if($attribute_field == 'id'){
                                                    continue;
                                                }

                                                $copied_work_report_form[$attribute_field] = $work_report_form_item[$attribute_field];
                                            }

                                            $copied_work_report_form->works_id = $copied_work->id;

                                            if($copied_work_report_form->save()){
                                                $last_work_report_form_fields = $work_report_form_item->reportFormFields;

                                                foreach($last_work_report_form_fields as $work_report_form_field_item){

                                                    if($attribute_field == 'id'){
                                                        continue;
                                                    }


                                                    $copied_work_report_form_field = new WorkReportFormFields();

                                                    $last_work_report_form_fields_attributes = $work_report_form_field_item->attributes();

                                                    unset($last_work_report_form_fields_attributes['id']);

                                                    foreach($last_work_report_form_fields_attributes as $attribute_field){

                                                        if($attribute_field == 'id'){
                                                            continue;
                                                        }

                                                        $copied_work_report_form_field[$attribute_field] =  $work_report_form_field_item[$attribute_field];
                                                    }

                                                    $copied_work_report_form_field->work_report_forms_id = $copied_work_report_form->id;

                                                    $copied_work_report_form_field->save();
                                                }
                                            }
                                        }

                                    }



                                }
                            }

                        }
                    }


                } else {
                    $brand_saved = false;
                }

                $brand_status = $brand_saved?'ok':'error';

                return json_encode(array('status'=>'ok','brand_status'=>$brand_status,'errors'=>$brand_model->getErrors()));

    }
	
	public function actionGetAjaxCategoryName($id){
		$model = $this->findModel($id);
		
		return $model->name;
	}
	
	public function actionGetAjaxBrandName($id){
		$brand = Brands::findOne($id);
		
		$category = $brand->category;
		
		return json_encode(array('brand_name'=>$brand->name,'category_name'=>$category->name,'category_id'=>$category->id));
	}

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteBrand($id)
    {
        $brand = Brands::findOne($id);

        if($brand){
            if($brand->delete()){
                return 'ok';
            } else {
                return 'error';
            }

        } else {
            return 'error';
        }

        //return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
