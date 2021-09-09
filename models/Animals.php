<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "animals".
 *
 * @property int $id
 * @property string $title
 * @property int $age
 * @property int $type
 * @property int|null $status
 * @property string $created_dt
 * @property string|null $updated_dt
 *
 * @property AnimalsTypes $type0
 */
class Animals extends \yii\db\ActiveRecord
{
    public function behaviors() {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_dt'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_dt'],
                ],
                'value' => date('Y-m-d H:i:s'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animals';
    }

    const SCENARIO_CREATE = 'take';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'age', 'type'], 'required', 'on' => self::SCENARIO_CREATE],
            [['age', 'type', 'status'], 'integer'],
            [['created_dt', 'updated_dt'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => AnimalsTypes::className(), 'targetAttribute' => ['type' => 'id']],
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
            'age' => 'Age',
            'type' => 'Type',
            'status' => 'Status',
            'created_dt' => 'Created Dt',
            'updated_dt' => 'Updated Dt',
        ];
    }

    /**
     * Gets query for [[Type0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(AnimalsTypes::className(), ['id' => 'type']);
    }
}
