<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use app\models\Post;

class PostController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
 /*       return[
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ]
        ];*/   

        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
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
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */

    public function actionCreate()
    {
       $post_data =new Post();



       if($post_data->load(Yii::$app->request->post()))
       {

            $post_data->image = UploadedFile::getInstance($post_data,'image');
            $fileName = time().".".$post_data->image->extension;
            $post_data->image->saveAs('upload/'.$fileName);
            $post_data->image = $fileName;

            $post_data->save();

            return $this->redirect('index');
        }


        return $this->render('post',[
            'post_data' => $post_data,
        ]);
    }



    public function actionEdit($id)
    {


        $post_data = Post::findOne($id);

        $oldimage = $post_data->image;

        if($post_data == null)
        {
            echo "this request not found";
        }
        if($post_data->load(Yii::$app->request->post())){
         
            $post_data->image = UploadedFile::getInstance($post_data,'image');
            
            if($post_data->image != null)
            {
                
                $new_fileName = time().".".$post_data->image->extension;
                $post_data->image->saveAs('upload/'.$new_fileName);
                $post_data->image = $new_fileName;
                
            }
            else
            {

               // print_r($oldimage);die;
                $post_data->image = $oldimage;

            }

            $post_data->save();
       
            return $this->redirect('index');
        
        }

        return $this->render('edit',[
            'post_data'=>$post_data,

        ]);

    }

    public function actionDelete($id)
    {
        $post_data = Post::findOne($id);

        if($post_data == null)
        {
            echo "this request not found";
        }

        $post_data->delete();
        
        return $this->redirect('index');
        
    }

    public function actionView($id)
    {
        $post_data = Post::findOne($id);

        return $this->render('view', [
            'post_data' => $post_data,
        ]);
    }


}