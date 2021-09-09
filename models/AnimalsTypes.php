<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "animals_types".
 *
 * @property int $id
 * @property string|null $title
 * @property string $created_dt
 * @property string|null $updated_dt
 *
 * @property Animals[] $animals
 */
class AnimalsTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animals_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_dt'], 'required'],
            [['created_dt', 'updated_dt'], 'safe'],
            [['title'], 'string', 'max' => 255],
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
            'created_dt' => 'Created Dt',
            'updated_dt' => 'Updated Dt',
        ];
    }

    /**
     * Gets query for [[Animals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimals()
    {
        return $this->hasMany(Animals::className(), ['type' => 'id']);
    }
}
