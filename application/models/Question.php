<?php
use Elasticsearch\ClientBuilder;

/**
 * @name QuestionModel
 * @author 李腾
 */
class QuestionModel extends BaseMedoo {

    private $table = "question";
    private $type = "question";         //es索引下的type
    private $esClient;

    public function __construct() {
        $options = null;
        parent::__construct($options);
        $this->esClient = ClientBuilder::create()->build();
        $this->searchParam = array(
            'index' => $this->index,
            'type' => $this->type,
        );
    }

    public function search($words,$page = 1){
        $this->searchParam['body'] = json_encode([
            'query' => [
                'bool' => [
                    'should' => [
                        ['match' => ['title' => $words]],
                        ['match' => ['note' => $words]]
                    ]
                ]
            ],
            //'from' => ($page-1) * 10
        ]);
        $this->searchParam['body'] = json_encode([
    "query" => [
            "match_phrase" => [
                "title" => $words
        ]
    ],
    "highlight" => [
            "fields" => [
                "title" => []
        ]
    ]
]);
        $response = $this->esClient->search($this->searchParam);
        /*if(isset($response['timed_out'])&&$response['timed_out']==false){
            return $response['hits']['hits'];
        }else{
            return false;
        }*/
        return $response;
    }
    
    public function insertData($data) {
        if($data['id'] = $this->insert($this->table, $data)){echo 123;die;
            $this->createIndex($data);
        };
    }

    //全部更新es索引
    public function updateAllIndex(){
        $client = $this->esClient;
        //Elastic search php client
        $rtn = $this->query("select id,title,note from {$this->prefix}{$this->table} limit 10");

        //delete index which already created
        //$params = array();
        //$params['index'] = 'crm';
        //$client->indices()->delete($params);
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
            $params['type'] = 'question';

            //Document will be indexed to log_index/log_type/autogenerate_id
            $client->index($params);
        }
    }

    //建立es索引
    private function createIndex($data) {

        $params = array();
        $params['body'] = array(
            'title' => $data['title'],
            'note' => $data['note']
        );
        $params['id'] = $data['id'];
        $params['index'] = $this->index;
        $params['type'] = $this->type;

        $this->esClient->index($params);
        return true;
    }
}
