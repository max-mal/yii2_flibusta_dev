<?php

namespace app\api\controllers;

use Yii;
use app\core\models\Libavtorname;
use app\core\models\Libavtor;

class AuthorController extends BaseController
{

    public function actionList($page = 1, $query = '')
    {
        $cache = Yii::$app->cache;

        $list = Libavtorname::find()->limit(20)->offset(($page -1) * 20);
        if ($query) {

            $words = explode(' ', $query);
            $queryParts = [];
            foreach ($words as $word) {
                if (!$word) {
                    continue;
                }
                $queryParts[] = $word . '*';
            }

            $q = Yii::$app->db->quoteValue(implode(' ', $queryParts));
            $list->where("MATCH(FirstName,LastName) AGAINST ($q IN BOOLEAN MODE)");
        }

        $countQuery = Libavtor::find()->where('libavtor.AvtorId = libavtorname.AvtorId')->select(['COUNT(*)']);

        $list->select([
            'libavtorname.*',
            'count' => $countQuery,
            "MATCH(FirstName,LastName) AGAINST ($q IN BOOLEAN MODE) score"
        ])->orderBy(['score' => SORT_DESC]);

        $list->andWhere([
            '>', $countQuery, 0
        ]);

        $responseList = $cache->getOrSet('author-' . $page . '-'.  $query, function () use ($page, $query, $list) {
            
            $list = $list->all();
            $responseList = [];
            foreach ($list as $item) {
                $responseList[] = [
                    'id' => $item->AvtorId,
                    'name' => $item->FirstName,
                    'surname' => $item->LastName,
                    'count' => $item->count,
                    'description' => $item->getDescription(),
                    'isDeleted' => false,
                    'score' => $item->score,
                ];
            }
            return $responseList;
        }, 600);

        foreach ($responseList as $index => $responseItem) {
            $responseList[$index]['picture'] = Libavtorname::getPictureUrl($responseList[$index]['id']);
        }
        

        return [
            'ok' => true,
            'authors' => $responseList,
            'pages' =>  ceil($list->count() / 20) + 1,
        ];
    }

    public function actionGet($id)
    {
        $author = Libavtorname::find()->where(['AvtorId' => $id])->one();

        if (!$author) {
            return [
                'ok' => false
            ];
        }

        return [
            'ok' => true,
            'author' => [
                'id' => $author->AvtorId,
                'name' => $author->FirstName,
                'surname' => $author->LastName,
                'picture' =>  $author->getPicture(),
                'count' => $author->getBooks()->count(),
                'description' => $author->getDescription(),
                'isDeleted' => false,
            ]
        ];
    }

    public function actionByGenres($genres, $page = 1)
    {
        $list = Libavtorname::find();

        $list->innerJoin(
            'libavtor',
            'libavtor.AvtorId = libavtorname.AvtorId'
        );

        $list->innerJoin(
            'libgenre',
            'libgenre.BookId = libavtor.BookId'
        );

        $list->where([
            'in', 'libgenre.GenreId', explode(',', $genres),
        ]);
        
        $responseList = Yii::$app->cache->getOrSet('author--' . $page . '-'.  $genres, function () use ($page, $list, $genres) {
            $responseList = [];
            foreach ($list->limit(20)->offset(($page -1) * 20)->all() as $item) {
                $responseList[] = [
                    'id' => $item->AvtorId,
                    'name' => $item->FirstName,
                    'surname' => $item->LastName,
                    'picture' => $item->getPicture(),
                    'count' => $item->getBooks()->count(),
                    'description' => $item->getDescription(),
                    'isDeleted' => false,
                ];
            }

            return $responseList;
        }, 600);

        foreach ($responseList as $index => $responseItem) {
            $responseList[$index]['picture'] = Libavtorname::getPictureUrl($responseList[$index]['id']);
        }

        return [
            'ok' => true,
            'authors' => $responseList,
            'pages' =>  ceil($list->count() / 20) + 1,
        ];
    }

    public function actionImage($id)
    {
        $path = Yii::getAlias('@project') . '/storage/attached/authors/';
        $author = Libavtorname::findOne($id);

        if (!$author || !$author->pic || !file_exists($path . $author->pic->File)) {
            header('Location: /logo/project-default.png');
            die();
        }
        $imagePath = $path . $author->pic->File;
        header('Content-Type: ' . mime_content_type($imagePath));
        echo file_get_contents($imagePath);
        die();
    }
}
