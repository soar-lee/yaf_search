<?php

require_once('vendor/autoload.php');
use Elasticsearch\ClientBuilder;

/**
 * Created by PhpStorm.
 * User: liteng
 * Date: 2016/12/9
 * Time: 下午5:02
 */

function get_conn(){
    $host = '191.101.152.31';
    $port = '3306';
    $dbname = 'zj_crm';
    $user = 'root';
    $passwd = 'root';

    $conn = new PDO("mysql:host=191.101.152.31;port=3306;dbname=zj_crm",$user,$passwd);
    return $conn;
}
function create_index(){
    //Elastic search php client
    $client = ClientBuilder::create()->build();

    $sql = "SELECT * FROM zj_question limit 10";
    $conn = get_conn();
    $stmt = $conn->query($sql);
    $rtn = $stmt->fetchAll();

    //delete index which already created
    $params = array();
    $params['index'] = 'crm';
    $client->indices()->delete($params);
    //$client->indices()->create($params);

    //create index on log_date,src_ip,dest_ip
    $rtnCount = count($rtn);
    for($i=0;$i<$rtnCount;$i++){
        $params = array();
        $params['body'] = array(
            'title' => $rtn[$i]['title'],
            'note' => $rtn[$i]['note']
        );
        $params['id'] = $rtn[$i]['id'];
        $params['index'] = 'crm';
        $params['type'] = 'question';var_dump($params);die;

        //Document will be indexed to log_index/log_type/autogenerate_id
        $client->index($params);
    }
    echo 'create index done!';
}

function search(){
    //Elastic search php client
    $client = new Elasticsearch\Client();
    $params = array();
    $params['index'] = 'question_index';
    $params['type'] = 'question_type';
    $params['body']['query']['match']['note'] = '的';

    $rtn = $client->search($params);
    var_dump($rtn);
}
set_time_limit(0);
create_index();
//search();