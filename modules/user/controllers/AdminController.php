<?php

namespace app\modules\user\controllers;

use Yii;
use app\modules\user\models\User;
use app\modules\user\models\UserToken;
use app\modules\user\models\UserAuth;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * AdminController implements the CRUD actions for User model.
 */
class AdminController extends Controller
{
    /**
     * @var \app\modules\user\Module
     * @inheritdoc
     */
    public $module;
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        // check for admin permission (`tbl_role.can_admin`)
        // note: check for Yii::$app->user first because it doesn't exist in console commands (throws exception)
        if (!empty(Yii::$app->user) && !Yii::$app->user->can("admin")) {
            throw new ForbiddenHttpException('You are not allowed to perform this action.');
        }

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * List all User models
     * @return mixed
     */
    public function actionIndex()
    {
        /** @var \app\modules\user\models\search\UserSearch $searchModel */

        $searchModel = $this->module->model("UserSearch");
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        if(Yii::$app->user->identity->role_id != 1){
            $dataProvider->query->andWhere(['!=', 'role_id', 1]);
        }

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    /**
     * Display a single User model
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'user' => $this->findModel($id),
        ]);
    }

    /**
     * Create a new User model. If creation is successful, the browser will
     * be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $user = $this->module->model("User");
        $user->setScenario("admin");

        $post = Yii::$app->request->post();
        $userLoaded = $user->load($post);

        //Set Email as Username
        $user->username = $user->email;

        //Set user password for admin registration
        $user->newPassword = Yii::$app->params['defaultPassword'];

        // validate for ajax request
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user);
        }

        if ($userLoaded && $user->validate()) {
            $user->save(false);
            return $this->redirect(['index']);
        }

        // render
        return $this->render('create', compact('user'));
    }

    /**
     * Update an existing User model. If update is successful, the browser
     * will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        // set up user
        $user = $this->findModel($id);
        $user->setScenario("admin");

        $post = Yii::$app->request->post();
        $userLoaded = $user->load($post);

        //Set user password for admin registration
        $user->newPassword = Yii::$app->params['defaultPassword'];

        // validate for ajax request
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user);
        }

        // load post data and validate
        if ($userLoaded && $user->validate()) {
            //Set Email as Username
            $user->username = $user->email;

            $user->save(false);
            return $this->redirect(['index']);
        }

        // render
        return $this->render('update', compact('user'));
    }

    /**
     * Delete an existing User model. If deletion is successful, the browser
     * will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        // delete if profile is not Super Administrator with using primary key:'1'
        if($id != 1) {
            // delete userTokens first to handle foreign key constraint
            $user = $this->findModel($id);
            UserToken::deleteAll(['user_id' => $user->id]);
            UserAuth::deleteAll(['user_id' => $user->id]);
            $user->delete();
        }

        return $this->redirect(['index']);
    }

    /**
     * Find the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        /** @var \app\modules\user\models\User $user */
        $user = $this->module->model("User");
        $user = $user::findOne($id);
        if ($user) {
            return $user;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
