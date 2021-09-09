<?php

use app\models\AnimalsTypes;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Animals */
/* @var $animals_types app\models\AnimalsTypes */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'Take the Animal';
$this->params['breadcrumbs'][] = ['label' => 'Animals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="animals-create">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="animals-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->dropDownList(
        ArrayHelper::map((array)$animals_types, 'id', 'title'),
        [
            'prompt' => 'Select the type of animal',
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('Take Animal', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

    </div>