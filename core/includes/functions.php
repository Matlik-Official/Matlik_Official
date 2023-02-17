<?php

    function p($arr){
        echo '<pre>'.print_r($arr,true).'</pre>';
    };

    function wordLimit($string, $word_limit)
    {
        $words = explode(" ",$string);
        return implode(" ", array_splice($words, 0, $word_limit)) . ' ...';
    };