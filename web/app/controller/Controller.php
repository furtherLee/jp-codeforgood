<?php
class Controller{
    private static $global_context = array(
        "HOST_URL" => HOST_URL,
        "JS_HOME" => JS_HOME,
        "CSS_HOME" => CSS_HOME,
        "IMG_HOME" => IMG_HOME,
        "IMAGE_HOME" => IMAGE_HOME
    );

    protected function render($name, $context){
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../view');
        $twig = new Twig_Environment($loader);
        echo $twig->render("/$name.html", array_merge(Controller::$global_context, $context));
    }

    protected function ajaxReturn($ary, $code = 200){
        \Slim\Slim::getInstance()->response()->status($code);
        echo json_encode($ary);
    }

    protected function getUser(){
        fAuthorization::requireLoggedin();
        $userToken = fAuthorization::getUserToken();
        $user = new User($userToken['id']);
        return $user;
    }

    protected function getUserId() {
      $userToken = fAuthorization::getUserToken();
      return $userToken['id'];
    }

    protected function getUserFromToken($token) {
        try {
            $user = new User($token);
            return $user;
        } catch (fExpectedException $e) {
            return null;
        }
    }
}
?>
