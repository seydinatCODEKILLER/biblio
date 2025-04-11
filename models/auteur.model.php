<?php

function getAllAuteurs()
{
    $sql = "SELECT * FROM auteurs";
    return fetchResult($sql);
}
