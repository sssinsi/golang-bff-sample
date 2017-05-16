<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Firebase\JWT\JWT;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    // access to /index/sample
    public function sampleAction(){
        $key = 'sample_key';
        $token = [
            'exp' => time() + 86400,
            'nbf' => time(),
            'iat' => time(),
            'id' => '12345',
            'name' => 'bbb'
        ];

        $jwt = JWT::encode($token, $key);
        echo $jwt;
        exit;
    }
}
