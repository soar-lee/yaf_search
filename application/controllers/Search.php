<?php
/**
 * @name SearchController
 * @desc 搜索控制器，使用Elasticsearch搜索文章
 * @author 李腾
 */
class SearchController extends Yaf_Controller_Abstract {

	public function IndexAction() {
        $page = I("page");
        $words = I("words");
        $model = new QuestionModel();
        $res = $model->search($words,$page);
        if($res != false){
            $total = $res['hits']['total']; //总数
            $took = $res['took'];           //耗时
            $data = $res['hits']['hits'];   //数据
        }

        $this->getView()->assign("words",$words);
        $this->getView()->assign("took",$took);
        $this->getView()->assign("total",$total);
        $this->getView()->assign("data",$data);
        return true;
	}

    public function create_indexAction(){
        $model = new QuestionModel();
        $model->updateAllIndex();
        echo "create index done";

        return false;
    }
}
