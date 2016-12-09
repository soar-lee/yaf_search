<?php
require_once("medoo/medoo.php");
/**
 * @name QuestionModel
 * @author 李腾
 */
class QuestionModel extends medoo {

    private $table = "question";

    public function __construct($options) {
        parent::__construct($options);
    }   
    
    public function insertData($data) {
        $this->insert($this->table, $data);
    }

    public function insertSample($arrInfo) {
        return true;
    }
}
