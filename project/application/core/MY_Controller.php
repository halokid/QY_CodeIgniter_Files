<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }
}

class Ysd extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        session_start();
        //		print_r($_SESSION);
        
        //获取页面的控制器，判断是哪个导航
        $this->load->helper('nav');
//        $this->debug_dump($this->router->class);
        $this->data['controller'] = $this->router->class;
        
        // 类别显示
        $this->load->model('category_model');
        $this->data['categorys'] = $this->category_model->get_all_category();
//        $this->debug_dump($this->data['categorys'], '$category');
        // 底部显示
        $this->load->model('article_cat_model');
        $this->footdata['category'] = $this->article_cat_model->getfootdata();

        //读写分离连接句柄
        $this->writedb = $this->load->database('writedb', true);
        $this->readdb = $this->load->database('readdb', true);

        //检查是否已经登录
        $this->data['islogin'] = $this->check_login();

    }
    /**
	 *  导航获取类别函数
	 */
    public function getgoodcatname($cat_id)
    {
        return $this->category_model->getcatname($cat_id);
    }

    /**
	 * @todo 检查是否已经登录
	 * @return 已登录true， 否则false
	 */
    public function check_login()
    {
        if( isset($_SESSION['user_name']) && $_SESSION['user_name']!=''){
            return true;
        }else {
            return false;
        }
    }


    /**
	 * @todo debug info for develop
	 * @param $var
	 * @return string: debug info
	 */
    public function debug_dump($var, $var_name='')
    {
        echo "<br><br>------------------------------------ ".$var_name."------------------------<br><br>\n\r";
        if ( is_array($var)){
            print_r($var);
        }else{  
        var_dump($var);
        }
        echo "<br><br>-------------------------------------".$var_name." ------------------------<br>\n\r";
        echo '<br><br><br>';

    }

}



















