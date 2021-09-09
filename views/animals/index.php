<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AnimalsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Animal shelter';
$this->params['breadcrumbs'][] = $this->title;//print_r($animals_types)$animals_types
?>
<div class="animals-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Place the animal in a shelter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <p>
        <?= Html::a('Take the animal', ['take'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'age',
            [
                'label' => Yii::t('app', 'Animal Type'),
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($model) {
                    $value = Yii::t('app', $model->type0->title);
                    return "<span onclick='copyToClipboard(this)' title='{$value}'>{$value}</span>";
                }
            ],
            [
                'label' => Yii::t('app', 'Status'),
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    $value = Yii::t('app', $model->status);
                    $title = $value ? Yii::t('app', 'Available') : Yii::t('app', 'Not available');
                    return "<span onclick='copyToClipboard(this)' title='{$title}'>{$title}</span>";
                }
            ],
            //'created_dt',
            //'updated_dt',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
