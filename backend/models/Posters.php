<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "posters".
 *
 * @property int $id
 * @property string $title
 * @property float $price
 * @property int $category
 * @property string $image
 * @property string $description
 * @property int $user_id
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
            [['title', 'price', 'category', 'image', 'description', 'user_id'], 'required'],
            [['price'], 'number'],
            [['category', 'user_id', 'address'], 'default', 'value' => null],
            [['category', 'user_id', 'address'], 'integer'],
            [['description'], 'string'],
            [['title', 'image'], 'string', 'max' => 100],
            [['category'], 'unique'],
            [['user_id'], 'unique'],
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
            'price' => 'Price',
            'category' => 'Category',
            'image' => 'Image',
            'description' => 'Description',
            'user_id' => 'User ID',
            'address' => 'Address',
        ];
    }

    /**
     * Gets query for [[Address0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress0()
    {
        return $this->hasOne(Country::class, ['id' => 'address']);
    }

    /**
     * Gets query for [[Category0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::class, ['id' => 'category']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
