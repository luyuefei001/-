<?php
namespace backend\controllers;
use yii;
use yii\web\Controller;
class WxportController extends Controller
{
    public $enableCsrfValidation = false;
    //查询bawei数据库 news表中的数据
    public function actionSelect_news()
    {
         //获取news数据表信息
         //sql 语句
         //判断id是否存在
         if(!empty(yii::$app->request->get('id'))){
            $id = yii::$app->request->get('id');
            $sql = "SELECT * FROM `news` where id = '$id'";
         }
         else{
            $sql = "SELECT * FROM `news`";
         }
         
         $data = yii::$app->db->createCommand($sql)->queryAll();
         //循环遍历将时间戳转换为日期
         foreach ($data as $key => $value) {
             //获取时间戳
             $addtime = $value['addtime'];
             //将时间戳进行转换
             $time = date("Y-m-d",$addtime);
             //更换到data数组中
             $data[$key]['addtime'] = $time;
         }
         //转换为json格式 返回
         echo json_encode($data);
    }
    //将news表中的zan_num(点赞次数+1)
    public function actionUpload_news_zan_num()
    {
        //获取id
        $id = yii::$app->request->get('id');
        //sql 语句
        $sql = "UPDATE `news` SET `zan_num`=zan_num+1 where id = '$id'";
        // echo $sql;
        $res = yii::$app->db->createCommand($sql)->execute();
        if($res)
        {
            //修改成功之后 重新调用actionSelect_news方法 获取全部的数据
           $this->actionSelect_news();
        }
    }

    //查询goods表
    public function actionShow()
    {
        $sql = "SELECT * FROM `goods`";
        $data = yii::$app->db->createCommand($sql)->queryAll();
        // echo json_encode($data);
        //无限极分类
        $info = $this->generateTree($data);
        echo json_encode($info);
    }
    //无限极分类(递归方法)
    public function getchild($data,$id = 0 ,$level = 0)
    {
        static $arr = [];
        foreach ($data as $key => $value) {
            if($value['pid'] == $id){
                $value['level'] = $level;
                $arr[] = $value;
                $this->getchild($data,$value['id'],$level+1);
            }
        }
        return $arr;
        
    }
     //无限极分类(引用)
    function generateTree($array){
        //第一步 构造数据
        $items = array();
        //将数组的下标变为id
        foreach($array as $value){
            $items[$value['id']] = $value;
        }
        //第二部 遍历数据 生成树状结构
        $tree = array();
        foreach($items as $key => $value){
            //如果pid这个节点存在
            if(isset($items[$value['pid']])){
                 //把当前的$value放到pid节点的son中 注意 这里传递的是引用 
                $items[$value['pid']]['son'][] = &$items[$key];
            }else{
                $tree[] = &$items[$key];
            }
        }
        return $tree;
    }



    public function actionYong()
    {
         $arr   = array(
            array
            (
                'id'       => 1,
                'pid'      => 0,
                'catename' => '电器',
            ),
            array
            (
                'id'       => 2,
                'pid'      => 0,
                'catename' => '服装',
            ),
            array
            (
                'id'       => 3,
                'pid'      => 0,
                'catename' => '',
            ),
            array
            (
                'id'       => 5,
                'pid'      => 0,
                'catename' => '',
            )
        );
        foreach ($arr as $k => &$v) {
             if($v['catename']==''){
                unset($v['catename']);
             }
        }
        echo json_encode($arr);

    }


}
?>