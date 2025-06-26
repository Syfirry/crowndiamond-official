<?php
class MainController extends BaseController {
	function actionIndex(){
        include(APP_DIR.'/protected/data/services.php');
        include(APP_DIR.'/protected/data/therapists.php');
 //       global $services;
        $client_ip = get_ip();
    
        $this->cur_nav = 0;
        $this->services = $services;
        $this->therapists = $therapists;

        $this->display('frontend/'.$GLOBALS['config']['enabled_theme'].'/index.html');
	}
    
    function actionServices() {
        include(APP_DIR.'/protected/data/services.php');
        $name = htmlentities(trim(request('name','')));
        $id = request('id',0);
        $this->cur_nav = 1;
        
        $display_services = array();
        if($id != 0)
        {
            foreach($services as $sv)
            {
                if($sv['id'] == $id)
                {
                    array_push($display_services, $sv);
                    break;
                }
            }
        }
        else if($name != '')
        {
            foreach($services as $sv)
            {
                if($sv['name'] == $name)
                {
                    array_push($display_services, $sv);
                    break;
                }
            }
        }
        else
            $display_services = $services;
        $this->services = $display_services;
        $this->display('frontend/'.$GLOBALS['config']['enabled_theme'].'/services.html');
    }

    function actionTherapists()
    {
        include(APP_DIR.'/protected/data/therapists.php');
        $name = htmlentities(trim(request('name','')));
        $id = request('id',0);
        $this->cur_nav = 2;
        
        $display_therapists = array();
        if($name != '')
        {
            foreach($therapists as $therapist)
            {
                if($therapist['name'] == $name)
                {
                    array_push($display_therapists, $therapist);
                    break;
                }
            }
        }
        else
            $display_therapists = $therapists;
        $this->therapists = $display_therapists;
        $this->display('frontend/'.$GLOBALS['config']['enabled_theme'].'/therapists.html');
    }

    function actionRates()
    {
        include(APP_DIR.'/protected/data/rates.php');
        include(APP_DIR.'/protected/data/addons.php');
        $this->cur_nav = 3;
 //       $this->actionUnavailable();
        $this->rates = $rates;
        $this->addons = $addons;
        $this->display('frontend/'.$GLOBALS['config']['enabled_theme'].'/rates.html');
    }

    function actionCareer()
    {
        $this->cur_nav = 5;
        $this->display('frontend/'.$GLOBALS['config']['enabled_theme'].'/career.html');
    }
    
    function actionContact(){
        $this->cur_nav = 6;

        $this->display('frontend/'.$GLOBALS['config']['enabled_theme'].'/contact.html');
    }

    function actionBooking()
    {
        $this->cur_nav = 4;
        $this->actionUnavailable();
    }

    function actionTherapistDetails()
    {
        include(APP_DIR.'/protected/data/therapists.php');
        $name = htmlentities(trim(request('name','')));
        $therapist = array();
        foreach($therapists as $th)
        {
            if(trim($th['name']) == $name)
            {
                $therapist = $th;
                break;
            }
        }

        $this->cur_nav = 2;
        $this->therapist = $therapist;
        $this->display('frontend/'.$GLOBALS['config']['enabled_theme'].'/therapist_details.html');

    }
    
    public function actionSubscription()
    {
        if(request('step','') == 'submit')
        {
            $email = htmlentities(trim(request('email','')));
            $subscription_model = new subscription_model();
            
            if($subscription_model->find(array('email' => $email)))
            {
                $this->prompt('error', '你的電郵地址已經提交過一次，請勿重複提交', url('main','index'));
            }
            else
            {
                $data = array('email' => $email);
                $verifier = $subscription_model->verifier($data);
                if(TRUE === $verifier){
                    $data['ip'] = get_ip();
                    $data['ts'] = $_SERVER['REQUEST_TIME'];
                    $subscription_model->create($data);
                    $this->prompt('prompt', '我們已經收到您的訂閱請求。', url('main','index'));
                }
                else
                    $this->prompt('error', $verifier, url('main','index'));
            }
        }
    }
    
    //Function not available
    public function actionUnavailable(){
        $this->display('frontend/'.$GLOBALS['config']['enabled_theme'].'/unavailable.html');
    }
}