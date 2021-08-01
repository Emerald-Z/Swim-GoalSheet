<?php

namespace app\controllers;

use Yii;
use app\models\Group;
use app\models\Goal;
use app\models\User;
use app\models\Swimmer;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GroupController implements the CRUD actions for Group model.
 */
class GroupController extends Controller
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
     * Lists all Group models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Group::find()->andWhere(["coach_id" => Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        if(Yii::$app->user->identity->role != 'coach'){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

         /**
     * Lists all Group Goals models.
     * @return mixed
     */
    public function actionGoals_and_splits($id)
    {
        $query = Goal::find()->joinWith('user')->andWhere('group_id' == $id);
        $result = Goal::find()->joinWith(['split','user'])->with('split')->all();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'first_name' => [
                        'asc' => ['user.first_name' => SORT_ASC],
                        'desc' => ['user.first_name' => SORT_DESC]
                    ],
                    'last_name',
                    'event',
                ]
                
            ]
        ]);

        if(Yii::$app->user->identity->role != 'coach'){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('goals_and_splits', [
            'dataProvider' => $dataProvider,
            'result' => $result,
            'model' => $this->findModel($id),
        ]);

    }

    /**
     * Displays a single Group model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $query = User::find()->andWhere(["group_id" => $id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query
        ]);

        if(Yii::$app->user->identity->role != 'coach'){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Creates a new Group model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Group();
        $model->coach_id = Yii::$app->user->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Group model.
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

        return $this->render('update', [
            'model' => $model,
        ]);
    }

      /**
     * Adds a swimmer to a group.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionAdd_swimmer_to_group($id)
    {
        $swimmers_in_group = Group::getAllSwimmersinGroup($id);
        $swimmers_under_coach = Group::getAllSwimmers();
        $user_ids = Yii::$app->db->createCommand('select id from user where group_id <> :group_id', [':group_id' => $id])->queryColumn();
        if(Yii::$app->request->post()){
            $ids = Yii::$app->request->post('user_id');
            Yii::$app->db->createCommand('update user set group_id = :group_id where id in('.join(',', array_values($ids)).')', [':group_id' => $id])->execute();
            $this->redirect(['index']);
        }
        $swimmer = array_diff_assoc($swimmers_under_coach, $swimmers_in_group);
        
        return $this->render('add_swimmer_to_group', [
            'model' => $user_ids,
            'models' => $this->findModel($id),
            'swimmer' => $swimmer,
        ]);
    }



    /**
     * Deletes an existing Group model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        if(Yii::$app->user->identity->role != 'coach'){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Group model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Group the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Group::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
