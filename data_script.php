<?php

for($i=1;$i<=100;$i++){

    echo "第".$i."次请求\n";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://search.soarlee.com:8080/index/insert");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    //执行并获取HTML文档内容
    $output = curl_exec($ch);
    //释放curl句柄
    curl_close($ch);
    //打印获得的数据

    //sleep(10);
}

