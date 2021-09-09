<?php

namespace app\controllers;

use app\models\Animals;
use app\models\AnimalsSearch;
use app\models\AnimalsTypes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnimalsController implements the CRUD actions for Animals model.
 */
class AnimalsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Animals models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new Animals();
        $searchModel = new AnimalsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Animals model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Animals model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Animals(['scenario' => Animals::SCENARIO_CREATE]);
        $animals_types = AnimalsTypes::find()->all();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                //return $this->redirect(['view', 'id' => $model->id]);
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'animals_types' => $animals_types,
        ]);
    }

    /**
     * Take the Animal.
     * @return string|\yii\web\Response
     */
    public function actionTake()
    {
        $model = new Animals();
        $oldest_animal = Animals::find()->where(['status' => 1]);
        if (!empty($this->request->post('Animals')['type'])) {
            $oldest_animal->andWhere(['type' => $this->request->post('Animals')['type']]);
        }
        $oldest_animal = $oldest_animal->orderBy(['created_dt' => SORT_ASC])->one();
        $animals_types = AnimalsTypes::find()->all();

        if ($this->request->isPost && !empty($oldest_animal)) {

                $oldest_animal->status = 0;
                if ($oldest_animal->save()) {
                    return $this->redirect(['index']);
                }

        } else {
            $model->loadDefaultValues();
        }

        return $this->render('take', [
            'model' => $model,
            'animals_types' => $animals_types,
        ]);
    }

    /**
     * Updates an existing Animals model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Animals model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Animals model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Animals the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Animals::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
