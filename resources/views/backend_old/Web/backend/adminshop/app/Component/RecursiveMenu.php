<?php
namespace App\Component;
use App\Models\Menu;
class  RecursiveMenu{
    private $html;
    public function __construct()
    {
        $this->html='';
    }
    public function menuRecursiveadd($parentId = 0, $submark = ''){
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            $this->html.= '<option value="' . $dataItem->id .' ">' . $submark.  $dataItem->name .'</option>';
            $this->menuRecursiveadd($dataItem->id, $submark. '--');
        }
        return $this->html;
    }
    public function menuRecursivedit($parentIdEdit, $parentId = 0, $submark = ''){
        $data = Menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            if ($parentIdEdit == $dataItem->id)
            {
                $this->html.= '<option selected value="' . $dataItem->id .' ">' . $submark.  $dataItem->name .'</option>';
            }
            else
            {
                $this->html.= '<option value="' . $dataItem->id .' ">' . $submark.  $dataItem->name .'</option>';

            }
            $this->menuRecursivedit($parentIdEdit, $dataItem->id, $submark. '--');
        }
        return $this->html;
    }
}
