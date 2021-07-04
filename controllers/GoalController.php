<?php

namespace app\controllers;

use Yii;
use app\models\Goal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GoalController implements the CRUD actions for Goal model.
 */
class GoalController extends Controller
{
    public $events = ["50 FREE" , "100 FREE" , "150 FREE"
    , "200 FREE", "500 FREE" , "1000 FREE" , "1650 FREE",
    "100 FLY" , "200 FLY" , "100 BACK" , "200 BACK", 
    "100 BREAST" , "200 BREAST"];
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
     * Lists all Goal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Goal::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
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
            if (strcmp($type_of_event, '50 FREE') == 0 || strcmp($type_of_event, '100 FREE') == 0
                || strcmp($type_of_event, '100 FLY') || strcmp($type_of_event, '100 BREAST')){
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
            else if (strcmp($type_of_event, '200 FREE') == 0 || strcmp($type_of_event, '500 FREE') == 0 || 
                strcmp($type_of_event, '1000 FREE') == 0 || strcmp($type_of_event, '1650 FREE') == 0 ||
                strcmp($type_of_event, '200 FLY') == 0 || strcmp($type_of_event, '200 BACK') == 0 ||
                strcmp($type_of_event, '200 BREAST') == 0
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
        $new_events = array_diff($this->events, $existing_events);
        $events = array_combine($new_events, $new_events);
        return $this->render('create', [
            'model' => $goal,
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
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
        $this->findModel($id)->delete();

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
