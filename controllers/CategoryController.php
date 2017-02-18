<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;


class CategoryController extends AppController{

    public function actionIndex(){
        $hits = Product::find()->where(['hit'=> '1'])->limit(6)->all();
        $this->setMeta('lashByLash');
        return $this->render('index', compact('hits'));
    }

    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $products = Product::find()->where(['category_id' => $id])->all();
        $category = Category::findOne($id);
        $this->setMeta('lashByLash | '. $category->name, $category->keywords, $category->description);
        return $this->render('view', compact('products', 'category'));
    }


}