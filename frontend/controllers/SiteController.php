<?php

namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Security;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\data\Pagination;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\User;
use frontend\models\Posters;
use frontend\models\Category;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['add'],
                'rules' => [
                    [
                        'actions' => ['add'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $model = Posters::find()->orderBy(['id'=> SORT_DESC])->limit(8)->all();
        return $this->render('index', [
            'posters' => $model
        ]);
    }
    public function actionPosters()
    {
        $db = Posters::find()->orderBy(['id'=> SORT_DESC]);

        $sahifa = new Pagination(
            [
                'totalCount' => $db -> count(),
                'defaultPageSize' => 10,
                // 'pageParam' => 'sahifa',
        ]);


        $test = $db -> offset($sahifa -> offset) ->limit($sahifa -> limit) -> all();
        return $this->render('posters', ['posters'=> $test, 'sahifa' => $sahifa]);
    }

    public function actionProfile($id)
    {
        $db = User::find()->where(['id' => $id])->all();
        $model = Posters::find()->where(['user_id'=> $id])->orderBy(['id'=> SORT_DESC])->all();
        return $this->render('profile', [
            'user'=> $db,
            'posters'=>$model
        ]);

    }



    public function actionAdd()
    {
        $t = time();
        $secure = new Security();
        $model = new \frontend\models\Posters();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->user_id = Yii::$app->user->id;
                $model->data = date("Y-m-d");
                $model->poster_id = time();
                // Upload image


                $model->image = UploadedFile::getInstance($model, 'image');
                $model->image->saveAs(
                    // Url::to('@frontend/web/images/').$t.".".$model->foto->extension
                    // Url::to('@frontend/web/images/').$secure->generateRandomString(20).".".$model->image->extension
                    Url::to('@frontend/web/images/').$t.".".$model->image->extension
                );
                // form inputs are valid, do something here
                $model->image = $t.".".$model->image->extension;


                $model->save();
                return $this->redirect(['/site/posters']);
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }

    public function actionOne($id)
    {
        $user = User::find()->all();
        $model = Posters::find()->where(['id'=> $id])->all();
        return $this->render('one', [
            'model'=> $model,
            'user'=> $user
            ]);
    }

    public function actionFilter($id)
    {
        $model = Posters::find()->where(['category' => $id])->orderBy(['id'=> SORT_DESC])->all();
        return $this->render('filter', [
            'posters' => $model
            ]);
    }


    public function actionEdit($id)
    {
        $checkPosters = Posters::findOne($id);
            if ( !Yii::$app->user->isGuest )
            {
                if ( (Yii::$app->user->identity->username == $checkPosters->user->username) || (Yii::$app->user->can('admin')) )
                {
                        $model = Posters::findOne($id);

                        if ($model -> load(Yii::$app->request->post()))
                            {
                                $model->save();
                                return $this->redirect(['/site/one', 'id'=>$id]);
                            }
                        return $this->render('edit', ['model'=>$model]);
                }
                else
                {
                    return $this->redirect(['/']);
                }
            }
            else
            {
                return $this->redirect(['/']);
            }
    }

    public function actionDelete($id)
    {
        $checkPosters = Posters::findOne($id);
            if ( !Yii::$app->user->isGuest )
            {
                if ( (Yii::$app->user->identity->username == $checkPosters->user->username) || (Yii::$app->user->can('admin')) )
                {
                        $model = Posters::findOne($id);
                        $model->delete();
                        return $this->redirect(['/site/posters']);
                }
                else
                {
                    return $this->redirect(['/']);
                }
            }
            else
            {
                return $this->redirect(['/']);
            }
    }
    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->redirect(['site/login']);
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            }

            Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if (($user = $model->verifyEmail()) && Yii::$app->user->login($user)) {
            Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
            return $this->goHome();
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
