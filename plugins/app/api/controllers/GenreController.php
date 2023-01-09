<?php

namespace app\api\controllers;

use Yii;
use app\core\models\Libgenrelist;
use app\core\models\Libbook;
use app\core\models\Librate;

use app\core\models\BookProgress;
use app\core\models\Libavtor;
use app\core\models\Libgenre;
use yii\helpers\ArrayHelper;

class GenreController extends BaseController
{

    public function actionList()
    {
        $cache = Yii::$app->cache;

        $responseList = $cache->getOrSet('genres', function () {
            $list = Libgenrelist::find()->all();
            $responseList = [];
            foreach ($list as $item) {
                $responseList[] = [
                    'id' => $item->GenreId,
                    'name' => $item->GenreDesc,
                    'picture' => 'https://source.unsplash.com/featured/?' . urlencode($item->GenreDesc),
                    'count' => $item->getBooks()->count(),
                    'isDeleted' => false,
                ];
            }
            return $responseList;
        }, 6000);
        

        return [
            'ok' => true,
            'genres' => $responseList,
        ];
    }

    public function actionGet($id)
    {
        $genre = Libgenrelist::findOne(['GenreId' => $genre]);
        return [
            'ok' => true,
            'genre' => [
                'id' => $genre->GenreId,
                'name' => $genre->GenreDesc,
                'picture' => 'https://source.unsplash.com/featured/?' . urlencode($genre->GenreDesc),
                'count' => $genre->getBooks()->count(),
                'isDeleted' => false,
            ]
        ];
    }


    public function actionBooks($genre, $page = 1, $popular = false)
    {
        return Yii::$app->runAction('api/books/list', [
            'genres' => $genre,
            'popular' => $popular,
            'page' => $page,
        ]);
    }
}
