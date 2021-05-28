<?php

    function isOpenTag($tag){
        if(preg_match('/<[a-z]+[0-6]?>$/', $tag) === 1){
            return mb_strcut($tag, 1, -1);
        } 
        return NULL;
    }

    function isCloseTag($tag){
        if(preg_match('/<\\/[a-z]+[0-6]?>$/', $tag) ===1){
            return mb_strcut($tag, 2, -1);
        } 
        return NULL;
    }

    function isCorrectTags($tagArray){
        $tagsStack = [];
        for($i = 0; $i < count($tagArray); $i++){
            if(isOpenTag($tagArray[$i]) !== null){
                $tagsStack[] = isOpenTag($tagArray[$i]);
            } elseif(isCloseTag($tagArray[$i]) !== array_pop($tagsStack)){
                return false;
            }
        }
        return !isset($tagsStack[0]);
    }

    var_dump(isCorrectTags(['<div>', '<a>', '</a>','</div>', '<span>', '</span>']));
    