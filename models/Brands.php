<?php

namespace app\models;

use Yii;

use app\models\Works;

/**
 * This is the model class for table "brands".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 *
 * @property Categories $category
 */
class Brands extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brands';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id'], 'integer'],
            [['name'], 'string', 'max' => 256],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Works::className(), ['brands_id' => 'id']);
    }

    public function getWorksByTypes($worker_types_id,$work_types_id,$brands_id=null){

        $brands_id = $brands_id?$brands_id:$this->id;

        $works = Works::find()->where(array('worker_types_id'=>$worker_types_id,'work_types_id'=>$work_types_id,'brands_id'=>$brands_id))
            ->orderBy('name')->all();

        return $works;

    }

    public function getBrandParentCategories(){
        $category = $this->category;

        $parent_categories = $category->getAllParentCategories();

        $parent_categories[] = $category;

        return $parent_categories;
    }

    public function getBrandCategoriesString(){
        $parent_categories = $this->getBrandParentCategories();

        $result = '';

        foreach($parent_categories as $k=>$value){
            if($k == 0){
                $result .= $value->name;
            } else {
                $result .= '|'.$value->name;
            }
        }

        $result .= '|'.$this->name;

        return $result;
    }


    static public function getAllBrandCategoriesStringsByNameOrder($parent_category_id=null){

        $result = array();

        if($parent_category_id === null){
            $brands = Brands::find()->orderBy(array('name'=>SORT_ASC))->all();


            foreach($brands as $brand_item){
                $result[$brand_item->id] = $brand_item->getBrandCategoriesString();
            }
        } else {
            $brands = Brands::find()->orderBy(array('name'=>SORT_ASC))->all();


            foreach($brands as $brand_item){
                if($brand_item->category->categoryIsChild($parent_category_id)) {
                    $result[$brand_item->id] = $brand_item->getBrandCategoriesString();
                }
            }
        }



        return $result;
    }
}
