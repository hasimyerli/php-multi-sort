<?php
  class multiSort
  {
    private $data_list = array();
    private $sort_list = array();
    private $extracted_list = array();
    private $temp_extracted_value_list = array();
    private $sort_type_list = array();

    function __construct(){
      $this->sort_type_list = array('numeric' => 1,'string' => 2,'regular' => 0,'asc' => 4,'desc' => 3);
    }

    public function getDataList(){
      return $this->data_list;
    }

    public function setDataList($data_list){
      $this->data_list = $data_list;
    }

    public function setSortList($sort_list){
      $this->sort_list = $sort_list;
    }

    public function sort(){
      $this->sortBySortList();
      $this->beforeMultipleSort();
      $this->multiSort();
      $this->list_merge();
    }

    private function sortBySortList(){
      foreach ($this->data_list as $key => $data_list_value) {
        #sort_list e göre verileri ayrıştırıyoruz
        foreach ($this->sort_list as $key => $sort_list_value) {
          if (array_key_exists($sort_list_value['name'],$data_list_value)) {
            $this->extracted_list[$sort_list_value['name']][] = $data_list_value;
            break;
          }
        }
      }
    }

    private function beforeMultipleSort(){
      foreach ($this->extracted_list as $key => $extracted_list_value) {
        foreach ($extracted_list_value as $value) {
          $this->temp_extracted_value_list[$key][] = $value[$key];
        }
      }
    }

    private function multiSort(){
      foreach ($this->sort_list as $key => $value) {
        if ($this->temp_extracted_value_list[$value['name']]) {
          array_multisort($this->temp_extracted_value_list[$value['name']], $this->getSortAndType($value['type']),$this->getSortAndType($value['sort']),$this->extracted_list[$value['name']]);
        }
      }
    }

    private function list_merge(){
      #ayrıştırdığımız verileri tekrar birleştiriyoruz
      $merge_list = array();
      foreach ($this->sort_list as $key => $value) {
        if ($this->extracted_list[$value['name']]) {
          $merge_list = array_merge($merge_list,$this->extracted_list[$value['name']]);
        }
      }
      $this->data_list = $merge_list;
    }

    private function getSortAndType($type) {
      return $this->sort_type_list[$type];
    }

  }

?>
