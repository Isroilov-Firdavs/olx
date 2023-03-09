<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "posters".
 *
 * @property int $id
 * @property string $title
 * @property int $price
 * @property int|null $category
 * @property string $image
 * @property string $description
 * @property int|null $user_id
 * @property int|null $address
 *
 * @property Country $address0
 * @property Category $category0
 * @property User $user
 */
class Posters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'category', 'address',  'description'], 'required'],
            // [['image'], 'file',],
            ['image', 'file', 'extensions' => 'png, jpg, png, webp '],
            // [['price', 'category', 'user_id', 'address'], 'default', 'value' => null],
            [['price', 'category', 'user_id', 'address'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 100],
            // [['image'], 'string', 'max' => 60],
            [['image'], 'file'],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category' => 'id']],
            [['address'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['address' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Maxsulot narxi',
            'category' => 'Kategoriya',
            'image' => 'Rasm',
            'description' => "Ma'lumot",
            'user_id' => 'User ID',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[Address0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddres()
    {
        return $this->hasOne(Country::className(), ['id' => 'address']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCate()
    {
        return $this->hasOne(Category::className(), ['id' => 'category']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
