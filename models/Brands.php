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
}
