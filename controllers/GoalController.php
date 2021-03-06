<?php

namespace app\controllers;

use Yii;
use app\models\Goal;
use app\models\Group;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GoalController implements the CRUD actions for Goal model.
 */
class GoalController extends Controller
{
   
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::class,
                
                'rules' => [
                   
                    // allow authenticated users
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    // everything else is denied
                ],
            ],
        
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Goal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $query = Goal::find()->andWhere(["user_id" => Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    'event'
                ]
                
            ]
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

        /**
     * Lists all Team Goal models.
     * @return mixed
     */
    public function actionTeamgoals()
    {
        
         if(Yii::$app->request->post()){
             if(Yii::$app->request->post('name')){
                $name=Yii::$app->request->post('name');
                $query = Goal::find()->joinWith(['user'])->andWhere(['=', 'coach_id', Yii::$app->user->id])->andWhere(['like', 'user.first_name', $name]);
             } else if(Yii::$app->request->post('event')){
                $event=Yii::$app->request->post('event');
                $query = Goal::find()->joinWith(['user'])->andWhere(['=', 'coach_id', Yii::$app->user->id])->andWhere(['like', 'goal.event', $event]);
             }else if(Yii::$app->request->post('group')){
                $group=Yii::$app->request->post('group');
                $query = Goal::find()->joinWith(['user', 'user.group'])->andWhere(['=', 'user.coach_id', Yii::$app->user->id])->andWhere(['like', 'group.group_name', $group]);
             }
            } else{
            $query = Goal::find()->joinWith(['user'])->andWhere(['=', 'coach_id', Yii::$app->user->id]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => [
                    'event',
                    'user_name' => [
                        'asc' => ['user.first_name' => SORT_ASC],
                        'desc' => ['user.first_name' => SORT_DESC]
                    ],
                    'group' => [
                        'asc' => ['group.group_name' => SORT_ASC],
                        'desc' => ['group.group_name' => SORT_DESC]
                    ]
                ]
                
            ]
        ]);

        return $this->render('teamgoals', [
            'dataProvider' => $dataProvider,
            'name' => $name?? '',
            'event' => $event?? '',
            'group' => $group?? '',
        ]);
    }

    /**
     * Lists all Split models.
     * @return mixed
     */
    public function actionSplit()
    {
        $result = Goal::find()->joinWith('split')->with('split')->andWhere(["user_id" => Yii::$app->user->id])->all();

        return $this->render('split', [
            'result' => $result,
        ]);
    }

    /**
     * Displays a single Goal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->user->id != $model->user_id){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Goal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $goal = new Goal(['user_id' => Yii::$app->user->id]);
        $existing_events = $goal->getGoalsByUserId(Yii::$app->user->id);
        if ($goal->load(Yii::$app->request->post())) {
            $type_of_event = $goal -> event;
            if ($type_of_event == '50 FREE'|| $type_of_event =='100 FREE'
                || $type_of_event == '100 FLY' || $type_of_event == '100 BREAST'){
                $goal -> step_name_1 = 'Start 15m';
                $goal -> step_name_2 = 'Start 25yd';
                $goal -> step_name_3 = 'Pace 100yd';
                $goal -> step_name_4 = 'Start 50 yd';
                $goal -> step_name_5 = 'Start 100 yd';
                
                if(strcmp($type_of_event, '50 FREE') == 0){
                    $goal -> step_name_3 = 'Start 50 yd';
                    $goal -> step_name_4 = 'Turn 10 yd';
                    $goal -> step_name_5 = '';
                }

            }
            else if ($type_of_event == '200 FREE' || $type_of_event == '500 FREE'|| 
                $type_of_event == '1000 FREE' || $type_of_event == '1650 FREE' ||
                $type_of_event == '200 FLY' || $type_of_event == '200 BACK' ||
                $type_of_event == '200 BREAST'
            ){
              
                $goal -> step_name_1 = 'Pace 50 yd';
                $goal -> step_name_2 = 'Pace 75 yd';
                $goal -> step_name_3 = 'Pace 100yd';
                $goal -> step_name_4 = 'Start 50 yd';
                $goal -> step_name_5 = 'Start 100 yd';
                if (strcmp($type_of_event, '1000 FREE') == 0 || strcmp($type_of_event, '1650 FREE') == 0){
                    $goal -> step_name_2 = 'Pace 100 yd';
                    $goal -> step_name_3 = 'Pace 150yd';
                    $goal -> step_name_5 = '';
                }
            }
            $goal->save();
            return $this->redirect(['view', 'id' => $goal->id]);
        }
        $new_events = array_diff($goal->events, $existing_events);
        $events = array_combine($new_events, $new_events);
        return $this->render('create', [
            'goal' => $goal,
            'events' => $events
        ]);
    }

    /**
     * Updates an existing Goal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $goal = $this->findModel($id);

        if ($goal->load(Yii::$app->request->post()) && $goal->save()) {
            return $this->redirect(['view', 'id' => $goal->id]);
        }

        if(Yii::$app->user->id != $goal->user_id){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        return $this->render('update', [
            'goal' => $goal,
        ]);
    }

    /**
     * Deletes an existing Goal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if(Yii::$app->user->id != $model->user_id){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Goal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Goal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Goal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
