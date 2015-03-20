<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class IndexController extends Controller {

    public function indexAction() {
        //重后台添加的
        $a = new CategoryModel();
        $rows = $a->getList();
        $array1 = array();
        $array2 = array();
        $b = 2;
        foreach ($rows as $row) {
            $array3 = array();
            if ($row['cat_parent_id'] == 1) {
                 $array1[] = $row['cat_name'];
            }
            if ($row['cat_parent_id'] == $b) {
                $cat_parent_id = $row['cat_parent_id'];

                foreach ($rows as $row) {
                    if ($row['cat_parent_id'] == $cat_parent_id) {
                        $array3[] = $row['cat_name'];
                    }
                }
                $array2[] = $array3;
                $b++;
            }
        }
        $this->assign('row1', $array1);
        $this->assign('row2', $array2);
        $this->display("index.html");
    }

}
