<?php

use app\models\AnimalsTypes;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Animals */
/* @var $animals_types app\models\AnimalsTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="animals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'type')->dropDownList(
        ArrayHelper::map((array)$animals_types, 'id', 'title')
    ) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
