<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Animals */
/* @var $animals_types app\models\AnimalsTypes */

$this->title = 'Animal';
$this->params['breadcrumbs'][] = ['label' => 'Animals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="animals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'animals_types' => $animals_types,
    ]) ?>

</div>
