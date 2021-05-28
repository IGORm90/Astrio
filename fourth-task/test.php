<?php

    //Файл для тестирования программы
    require 'dbBox.php';

    $file = DbBox::getInstance();
    $file->setData('set3','val1');
    $file->save();

