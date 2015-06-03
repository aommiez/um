<?php
namespace Main\CTL;


use Main\Context\Context;
use Main\DB\Medoo\MedooFactory;
use Main\Http\RequestInfo;
use Main\View\HtmlView;
use Main\View\JsonView;
use Main\ThirdParty\Xcrud\Xcrud;
use Symfony\Component\Console\Helper\Helper;


/**
 * @Restful
 * @uri /
 */

class IndexCTL extends BaseCTL {

    /**
     * @GET
     */
    public function index () {
        return new HtmlView('/index');
    }

    /**
     * @GET
     * @uri login
     */
    public function loginView () {
        return new HtmlView('/login');
    }
    /**
     * @GET
     * @uri employee
     */
    public function employeeView () {
        return new HtmlView('/employee');
    }
    /**
     * @GET
     * @uri logout
     */
    public function logout () {
        session_destroy();
        return new HtmlView('/login');
    }
    /**
     * @POST
     * @uri login/auth
     */
    public function loginAuth () {
        $db = MedooFactory::getInstance();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $db->get("user", "*", [
            "AND" => [
            "username" => $username,
            "password" => $password,
            ]
        ]);
        $arr = array();
        if ($result) {
            $arr['user'] = $result;
            $arr['status'] = "success";
            $_SESSION['user_id'] = $arr['user']['id'];
            $_SESSION['first_name'] = $arr['user']['first_name'];
            $_SESSION['level'] = $arr['user']['level'];
            unset($arr['user']['password']);
        } else {
            $arr['status'] = "username or password invaild";
        }
        return new JsonView($arr);
    }

}