<?php
class BaseController extends Controller{
    public $language;
    public $page_title;
    public $unpaid_order;
    public $redirect;
    public function init()
    {
        $this->APP_PATH = $GLOBALS['config']['AppPath'];
        $this->is_localhost = $GLOBALS['config']['is_localhost'];
        
        $this->cur_nav = 0;
    
        if($GLOBALS['config']['is_maintaining'])
        {
            $this->display('maintaining.html');
            exit;
        }
        
        $this->redirect = url('main','index');
        
        $this->common = array
        (
            'baseurl' => $GLOBALS['config']['http_host'],
            'cssfolder' => $GLOBALS['config']['http_host'].'/i/css/'.$GLOBALS['config']['enabled_theme'],
            'jsfolder' =>  $GLOBALS['config']['http_host'] . '/i/js/'.$GLOBALS['config']['enabled_theme'],
        );
        
        $this->enabled_theme = $GLOBALS['config']['enabled_theme'];
    }
    
    ///////////////////////////////////////
    //
    // 使用后台cart表中的数据设置客户端cart cookie
    //
    ///////////////////////////////////////
    public function setCartCookie()
    {
        //set cart cookie
        if(isset($_SESSION['USER']) && isset($_SESSION['USER']['USER_ID']))
        {
            $cart_model = new cart_model();
            $cookie_cart = $cart_model->create_cart_cookie($_SESSION['USER']['USER_ID']);
            setcookie('BAFFIN_CARTS', $cookie_cart, $_SERVER['REQUEST_TIME'] + 604800, '/');
        }
    }
    
    protected function is_logined($jump = FALSE)
    {
        if(empty($_SESSION['USER']['USER_ID']))
        {
            if($cookie = request('BAFFIN_USER_STAYED', null, 'cookie'))
            {
                $users_model = new users_model();
                if($users_model->check_stayed($cookie, get_ip()))
                {
                    return $_SESSION['USER']['USER_ID'];
                }
            }
            if($jump) jump(url('main', 'index'));
            return false;
        }
        else
        {
            $users_model = new users_model();
            $users_model->update_logined_info($_SESSION['USER']['USER_ID']);
            return $_SESSION['USER']['USER_ID'];
        }
        
    }
    
    public function postData($data,$url)
    {
        $ch = curl_init($url); 
        $postString = http_build_query($data, '', '&');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
        $response = curl_exec($ch);
        $error = curl_errno($ch); 
        curl_close($ch);
        
        return $response;
    }
    
       
    //检查当前访问者是否已登录
    public function CheckPermission()
    {
        $back = url('admin'.'/main', 'index');
        $admin_model = new admin_model();
        
        if( !isset($_SESSION['ADMIN']) || !$admin_model->find(array('user_id' => $_SESSION['ADMIN']['USER_ID'])) )
            $this->prompt('error', '您无权访问当前资源! 请先登录。', $back, 5);
    }
    
    public function CheckFormToken($errMsg, $back)
    {
        if(empty($_SESSION['USER_FORM_TOKEN']) || request($_SESSION['USER_FORM_TOKEN']['KEY']) != $_SESSION['USER_FORM_TOKEN']['VAL'])
            $this->prompt('error', $errMsg, $back, 5);
    }
    
    //return true or false
    public function CheckFormTokenFT($tokenKey, $tokenVal)
    {
        if(empty($_SESSION['USER_FORM_TOKEN']) || $tokenKey != $_SESSION['USER_FORM_TOKEN']['KEY']  || $tokenVal != $_SESSION['USER_FORM_TOKEN']['VAL'])
            return false;
        else
            return true;
    }
    
    public static function err404($module, $controller, $action){
	   header("HTTP/1.0 404 Not Found");
	   $controlObj = new Controller;
	   $controlObj->display("404.html");
	   exit;
    }
    
    protected function prompt($type = 'default', $text = '', $redirect = '', $time = 3)
    {
        if(empty($redirect)) $redirect = 'javascript:history.back()';
        $this->rs = array('type' => $type, 'text' => $text, 'redirect' => $redirect, 'time' => $time);
        
        if($type == 'default' || $type == 'prompt')
            $this->page_title = $this->language==0 ? "提示" : "Prompt";
        else
            $this->page_title = $this->language==0 ? "出錯了" : "Error";
        if(!empty($redirect))
            $this->redirect = $redirect;
        if($this->language == 0)
            $this->display('frontend/default/prompt.html');
        else
            $this->display('frontend/default/prompt_e.html');
        
        exit;
    }
    
} 