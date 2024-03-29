<?php
namespace App\Component;

    class Recursive{
        private $data;
        private $htmlselect = '';

        public function __construct($data){
            $this->data = $data;

        }

        public function CategoryRecursive($parentId, $id = 0, $text=''){
            foreach ($this->data as $value) {
                if ($value['parent_id'] == $id) {
                    if ( !empty($parentId) && $parentId == $value['id']) {
                        $this->htmlselect .= "<option selected value='" .$value['id']. "'>" . $text. $value['name']."</option>";
                    }
                    else{
                        $this->htmlselect .= "<option value='" .$value['id']. "'>". $text .$value['name']."</option>";
                    }

                    $this->CategoryRecursive($parentId, $value['id'],  $text .'--');
                }

            }
            return $this->htmlselect;
        }
        }
