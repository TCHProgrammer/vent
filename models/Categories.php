<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string $name
 *
 * @property Brands[] $brands
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 256],
            [['parent_id'], 'integer'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['parent_id' => 'id']],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrands()
    {
        return $this->hasMany(Brands::className(), ['category_id' => 'id'])->
        orderBy(['name' => SORT_ASC]);
    }

    public function getParent()
    {
        return $this->hasOne(Categories::className(), ['id' => 'parent_id']);
    }

    public function getChildren()
    {
        return $this->hasMany(Categories::className(), ['parent_id' => 'id'])->
        orderBy(['name' => SORT_ASC]);
    }

    static public function getChildrenMap($id=null){
        $result = array();

        if($id === null){
            $list = Categories::find()->where('parent_id IS NULL')->orderBy(array('name'=>SORT_ASC))->all();

            foreach($list as $item){
                $result[$item->id] = self::getChildrenMap($item->id);
                $result[$item->id]['brands'] = $item->brands;
            }


        } else {
            $model = Categories::findOne($id);
            if(count($model->children)){
                $list = Categories::find()->where(array('parent_id'=>$model->id))->orderBy(array('name'=>SORT_ASC))->all();

                foreach($list as $item){
                    $result[$item->id] = self::getChildrenMap($item->id);
                    $result[$item->id]['brands'] = $item->brands;
                }

                $result['brands'] = $model->brands;

            } else  {
                $result['brands'] = $model->brands;
            }
        }

        return $result;

    }

    static public function displayCategoriesMap($id=null){

        $result = '';

        if($id === null){
            $children_map = self::getChildrenMap();

            foreach($children_map as $key=>$value){
                $result .= '<div class="main-category">';
                $result .= '<div class="main-category-title">';
                $result .= Categories::findOne($key)->name;
                $result .= '</div>';
                $result .= '<div class="category-children">';
                $result .= self::displayCategoriesMap($key);
                $result .= '</div>';
                //$result .= '</div>';


                $result .= '<div category-brands>';

                foreach(Categories::findOne($key)->brands as $brand_item){
                    $result .= '<div class="brand">'.$brand_item->name.'</div>';
                }

                $result .= '</div>';
                $result .= '</div>';
            }



        } else {
            $children_map = self::getChildrenMap($id);

            foreach($children_map as $key=>$value){

                if($key == 'brands'){
                    continue;
                }

                $result .= '<div class="category">';
                $result .= '<div class="category-title">';
                $result .= Categories::findOne($key)->name;
                $result .= '</div>';
                $result .= '<div class="category-children">';
                $result .= self::displayCategoriesMap($key);
                $result .= '</div>';
                //$result .= '</div>';

                $result .= '<div category-brands>';

                foreach(Categories::findOne($key)->brands as $brand_item){
                    $result .= '<div class="brand">'.$brand_item->name.'</div>';
                }

                $result .= '</div>';
                $result .= '</div>';

            }


        }

        return $result;

    }


}
