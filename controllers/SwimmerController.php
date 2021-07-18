<?php

namespace app\controllers;

use Yii;
use app\models\Swimmer;
use app\models\Goal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for Swimmer model.
 */
class SwimmerController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Swimmer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Swimmer::find()->joinWith('group')->with('group')->andWhere(["role" => 'swimmer']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'first_name',
                    'last_name',
                    'group' => [
                        'asc' => ['group.group_name' => SORT_ASC],
                        'desc' => ['group.group_name' => SORT_DESC]
                    ]
                ]
                
            ]
        ]);

        if(Yii::$app->user->identity->role != 'coach'){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);

    }

    /**
     * Displays a single Swimmer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $query = Goal::find()->andWhere(["user_id" => $id]);
        $result = Goal::find()->joinWith('split')->with('split')->andWhere(["user_id" => $id])->all();
        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        return $this->render('view', [
            'dataProvider' => $dataProvider,
            'model' => $this->findModel($id),
            'result' => $result,
        ]);
    }

    /**
     * Displays Account Information for a swimmer.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionAccount($id)
    {
        if ($id != Yii::$app->user->id){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $this->render('account', [
            'model' => $this->findModel($id),
        ]);
    }

       /**
     * Deletes a Swimmer from a group.
     */
    public function actionRemove_from_group($id)
    {
        $model = $this->findModel($id);
        $model->group_id = null;

        if($model->save()){
            return $this->redirect(['index']);
        }
    }

    /**
     * Function to add a Swimmer to a group.
     */
    public function actionAdd_to_group($id)
    {
        $model = $this->findModel($id);
        $model->group_id = null;

        if($model->save()){
            return $this->redirect(['index']);
        }
    }


    /**
     * Creates a new Swimmer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Swimmer();
        $model->role = 'swimmer';
        $model->coach_id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Swimmer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        if ($id != Yii::$app->user->id && Yii::$app->user->id != $model->coach_id){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Swimmer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($id != Yii::$app->user->id && Yii::$app->user->id != $model->coach_id){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Swimmer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Swimmer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Swimmer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
