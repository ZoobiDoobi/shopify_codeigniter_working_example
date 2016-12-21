<?php

class Auth extends CI_Controller{

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    
    
    public function access(){
        
        $shop = $this->input->get('shop');
        if(isset($shop)){
            $this->session->set_userdata($shop);
        }

        if(($this->session->userdata('access_token'))){
            $data = array(
                'api_key' => $this->config->item('shopify_api_key'),
                'shop' => $shop
            );
            $this->load->view('welcome',$data);
        }
        else{
            $this->auth($shop);
        }
    }

    public function auth($shop){

        $data = array(
            'API_KEY' => $this->config->item('shopify_api_key'),
            'API_SECRET' => $this->config->item('shopify_secret'),
            'SHOP_DOMAIN' => $shop,
            'ACCESS_TOKEN' => ''
        );
        $this->load->library('Shopify' , $data); //load shopify library and pass values in constructor

        $scopes = array('read_orders','write_orders'); //what app can do
        $redirect_url = $this->config->item('redirect_url'); //redirect url specified in app setting at shopify
        $paramsforInstallURL = array(
            'scopes' => $scopes,
            'redirect' => $redirect_url
        );

        $permission_url = $this->shopify->installURL($paramsforInstallURL);
         
        $this->load->view('auth/escapeIframe', ['installUrl' => $permission_url]);
        
    }

    public function authCallback(){
        $code = $this->input->get('code');
        $shop = $this->input->get('shop');

        if(isset($code)){
            $data = array(
            'API_KEY' => $this->config->item('shopify_api_key'),
            'API_SECRET' => $this->config->item('shopify_secret'),
            'SHOP_DOMAIN' => $shop,
            'ACCESS_TOKEN' => ''
        );
            $this->load->library('Shopify' , $data); //load shopify library and pass values in constructor
        }

        $accessToken = $this->shopify->getAccessToken($code);
        $this->session->set_userdata(['shop' => $shop , 'access_token' => $accessToken]);

        redirect('https://'.$shop.'/admin/apps');
    }

    
}