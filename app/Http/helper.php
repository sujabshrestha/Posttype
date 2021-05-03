<?php

use App\PostType;

function allpostttype(){
    $posttypes = PostType::all();
    return $posttypes;
}
?>
