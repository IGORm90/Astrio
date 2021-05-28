<?php

$categories = [
	[
   	"id" => 1,
   	"title" =>  "Обувь",
   	'children' => [
       	[
           	'id' => 2,
           	'title' => 'Ботинки',

           	'children' => [
               	['id' => 3, 'title' => 'Кожа'],
               	['id' => 4, 'title' => 'Текстиль'],
               ],
        ],
       	['id' => 5, 'title' => 'Кроссовки'],
       ]
    ],
	[
   	"id" => 6,
   	"title" =>  "Спорт",
   	'children' => [
       	[
            'id' => 7,
           	'title' => 'Мячи'
        ]
       ]
    ],
];

function searchCategory($categories, $id = 1){
    static $categoryName;
    
    foreach($categories as $cat){
        if($cat['id'] == $id){
            $categoryName = $cat['title'];
        } elseif(isset($cat['children'])){
            searchCategory($cat['children'], $id);
        }
    }
    return $categoryName; 
}

var_dump(searchCategory($categories, 8));
