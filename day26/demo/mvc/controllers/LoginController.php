<?php
/**
 * Created by PhpStorm.
 * User: tu901
 * Date: 5/17/2020
 * Time: 12:08 PM
 */

require_once "assets/src/Facebook/autoload.php";
require_once "models/User.php";
class LoginController {
    public function register() {
        if (isset($_POST['submit'])) {
            if (empty($_POST['FirstName'])) {
                $_SESSION['error'] = 'Cần nhập First Name';
            }
            elseif (empty($_POST['LastName'])) {
                $_SESSION['error'] = 'Cần nhập Last Name';
            }
            elseif (empty($_POST['email'])) {
                $_SESSION['error'] = 'Cần nhập email người dùng';
            }
            elseif (empty($_POST['password'])) {
                $_SESSION['error'] = 'Cần nhập mật khẩu';
            }
            elseif (empty($_POST['re-password'])) {
                $_SESSION['error'] = 'Cần nhập nhập lại mật khẩu';
            }
            elseif ($_POST['password']  != $_POST['re-password']) {
                $_SESSION['error'] = 'Mật khẩu chưa trùng khớp';
            }
            else {
                $users_model = new User();
                $verification = false;
                $users = $users_model->getUsers();

                foreach ($users AS $user) {
                    if ($user['email'] == $_POST['email']) {
                        $verification = true;
                        break;
                    }
                }
                if ($verification == true) {
                    $_SESSION['error'] = "Email này của bạn đã được đăng ký";
                }
                else {
                    $users_model->first_name = $_POST['FirstName'];
                    $users_model->last_name = $_POST['LastName'];
                    $users_model->email = $_POST['email'];
                    $users_model->id_user = '';
                    $users_model->password = $_POST['password'];
                    $users_model->username = $_POST['FirstName']. " ". $_POST['LastName'];
                    if ($users_model->insert()) {
                        $_SESSION['success'] = "Đăng ký thành công";
                        $_SESSION['email'] = $_POST['email'];
                    }
                    else {
                        $_SESSION['error'] = "Đăng ký thất bại";
                    }
                    header("Location: index.php");
                    exit();
                }
            }
        }

        require_once "configs/fbconfig.php";
        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('http://localhost/test/mvc/index.php?action=callback_fb', $permissions);

        require_once "configs/ggconfig.php";
        $login_button = '';
        if(!isset($_SESSION['access_token']))
        {
            //Create a URL to obtain user authorization
            $login_button = $google_client->createAuthUrl() ;
        }
        $_SESSION['register'] = '';
        require_once "views/login_register/register.php";
    }
    public function login() {
        if (isset($_SESSION['register'])) {
            unset($_SESSION['register']);
        }
        if (isset($_POST['submit'])) {
            if (empty($_POST['email'])) {
                $_SESSION['error'] = 'Cần nhập email người dùng';
            }
            elseif (empty($_POST['password'])) {
                $_SESSION['error'] = 'Cần nhập mật khẩu';
            }
            else {
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['password'] = $_POST['password'];

                if ($this->Verification() == false) {
                    $_SESSION['email'] = NULL;
                    $_SESSION['password'] = NULL;
                    $_SESSION['error'] = 'Email hoặc mật khẩu không đúng';
                };
                header("Location: index.php");
                exit();
            }
        }

        require_once "configs/fbconfig.php";
        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl('http://localhost/test/mvc/index.php?action=callback_fb', $permissions);

        require_once "configs/ggconfig.php";
        $login_button = '';
        if(!isset($_SESSION['access_token']))
        {
            //Create a URL to obtain user authorization
            $login_button = $google_client->createAuthUrl() ;
        }
        require_once "views/login_register/login.php";
    }

    public function callback_fb() {
        require_once "configs/fbconfig.php";
        try {
            $accessToken = $helper->getAccessToken();
            $response = $fb->get('me?fields=id,name,email,picture,first_name,last_name', $accessToken);
        } catch (Facebook\Exceptions\FacebookResponseException $e) {
// When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (Facebook\Exceptions\FacebookSDKException $e) {
// When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        if (!isset($accessToken)) {
            if ($helper->getError()) {
                header('HTTP/1.0 401 Unauthorized');
                echo "Error: " . $helper->getError() . "\n";
                echo "Error Code: " . $helper->getErrorCode() . "\n";
                echo "Error Reason: " . $helper->getErrorReason() . "\n";
                echo "Error Description: " . $helper->getErrorDescription() . "\n";
            } else {
                header('HTTP/1.0 400 Bad Request');
                echo 'Bad request';
            }
            exit;
        }
        $me = $response->getGraphUser();
        $name =  $me->getName();
        $id =  $me->getId();
        $email =  $me->getEmail();
        $picture = $me->getPicture()['url'];
        $first_name = $me->getFirstName();
        $last_name = $me->getLastName();

        $_SESSION['fb_access_token'] = (string) $accessToken;
        $_SESSION['username'] = $name;
        $_SESSION['id']  = $id;
        $_SESSION['email'] = $email;
        $_SESSION['pic'] = $picture;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;

        if (isset($_SESSION['register'])) {
            if($this->Verification()) {
                foreach ($_SESSION AS $key => $value) {
                    if ($key !== 'error'){
                        unset($_SESSION[$key]);
                    }
                }
                $_SESSION['username'] = NULL;
                $_SESSION['email'] = NULL;
                $_SESSION['error'] = 'Tải Khoản này của bạn đã đăng ký';
            }
            else {
                $users_model = new User();
                $users_model->first_name = $_SESSION['first_name'];
                $users_model->last_name = $_SESSION['last_name'];
                $users_model->email = $_SESSION['email'];
                $users_model->id_user = $_SESSION['id'];
                $users_model->password = '';
                $users_model->username = $_SESSION['username'];
                if ($users_model->insert()) {
                    $_SESSION['success'] = "Đăng ký thành công";
                }
                else {
                    $_SESSION['success'] = "Đăng ký thất bại";
                }
            }

        }
        else {
            if ($this->Verification() == false) {
                foreach ($_SESSION AS $key => $value) {
                    if ($key !== 'error'){
                        unset($_SESSION[$key]);
                    }
                }
                $_SESSION['username'] = NULL;
                $_SESSION['email'] = NULL;
                $_SESSION['error'] = 'Tải Khoản Facebook của bạn chưa đăng ký';
            }
        }

        header("Location: index.php");
        exit();
    }
    public  function callback_gg () {
        require_once "configs/ggconfig.php";
        $login_button = '';
        if(isset($_GET["code"]))
        {
            //It will Attempt to exchange a code for an valid authentication token.
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

            //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
            if(!isset($token['error']))
            {
                //Set the access token used for requests
                $google_client->setAccessToken($token['access_token']);

                //Store "access_token" value in $_SESSION variable for future use.
                $_SESSION['access_token'] = $token['access_token'];

                //Create Object of Google Service OAuth 2 class
                $google_service = new Google_Service_Oauth2($google_client);

                //Get user profile data from google
                $data = $google_service->userinfo->get();


                //Below you can find Get profile data and store into $_SESSION variable
                if(!empty($data['given_name']))
                {
                    $_SESSION['first_name'] = $data['given_name'];
                }

                if(!empty($data['family_name']))
                {
                    $_SESSION['last_name'] = $data['family_name'];
                }

                if(!empty($data['email']))
                {
                    $_SESSION['email'] = $data['email'];
                }

                if(!empty($data['gender']))
                {
                    $_SESSION['user_gender'] = $data['gender'];
                }

                if(!empty($data['picture']))
                {
                    $_SESSION['pic'] = $data['picture'];
                }
                if (!empty($data['id'])){
                    $_SESSION['id'] = $data['id'];
                }
                if (!empty($data['given_name']) || !empty($data['family_name'])) {
                    $_SESSION['username'] = $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
                }
                if (isset($_SESSION['register'])) {
                    if($this->Verification()) {
                        $google_client->revokeToken();
                        foreach ($_SESSION AS $key => $value) {
                            if ($key !== 'error'){
                                unset($_SESSION[$key]);
                            }
                        }
                        $_SESSION['username'] = NULL;
                        $_SESSION['email'] = NULL;
                        $_SESSION['error'] = 'Tải Khoản này của bạn đã đăng ký';
                    }
                    else {
                        $users_model = new User();
                        $users_model->first_name = $_SESSION['first_name'];
                        $users_model->last_name = $_SESSION['last_name'];
                        $users_model->email = $_SESSION['email'];
                        $users_model->id_user = $_SESSION['id'];
                        $users_model->password = '';
                        $users_model->username = $_SESSION['username'];
                        if ($users_model->insert()) {
                            $_SESSION['success'] = "Đăng ký thành công";
                        }
                        else {
                            $_SESSION['error'] = "Đăng ký thất bại";
                        }
                    }

                }
                else {
                    if ($this->Verification() == false) {
                        $google_client->revokeToken();
                        foreach ($_SESSION AS $key => $value) {
                            if ($key !== 'error') {
                                unset($_SESSION[$key]);
                            }
                        }
                        $_SESSION['username'] = NULL;
                        $_SESSION['email'] = NULL;
                        $_SESSION['error'] = 'Tài Khoản Goole của bạn chưa đăng ký';

                    }
                }
                header("Location: index.php");
                exit();
            }
        }
    }
    public  function Verification() {
        $nobuu =  false;
        if (!empty($_SESSION['id']) || isset($_SESSION['id'])) {
            $get_users = new User();
            $users = $get_users->getUsers();
            foreach ( $users AS $user) {
                if (!empty($user['id_user'])) {
                    if ($_SESSION['id']==$user['id_user'] &&  ($_SESSION['email'] == $user['email']) ){
                        $nobuu = true;
                        break;
                    }
                }
            }
        }
        else {
            $get_users = new User();
            $users = $get_users->getUsers();
            foreach ( $users AS $user) {
                if (empty($user['id_user'])) {
                    if ($_SESSION['password']==$user['password'] && ($_SESSION['email'] == $user['email'])  ) {
                        $nobuu = true;
                        break;
                    }
                }
            }

        }
        return $nobuu;
    }
}