<?php

/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

class Module {

    const VERSION = '3.0.2dev';

    protected $whitelist = ['Application\Controller\Login'];

    public function getConfig() {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function onBootstrap($e) {
        $app = $e->getApplication();
        $em = $app->getEventManager();
        $sm = $app->getServiceManager();
      // print_r($sm);

//        
//        $auth = $sm->get('zfcuser_auth_service');
//
//        $em->attach(MvcEvent::EVENT_ROUTE, function($e) use ($list, $auth) {
//            $match = $e->getRouteMatch();
//
//            // No route match, this is a 404
//            if (!$match instanceof RouteMatch) {
//                return;
//            }
//
//            // Route is whitelisted
//            $name = $match->getMatchedRouteName();
//            if (in_array($name, $list)) {
//                return;
//            }
//
//            // User is authenticated
//            if ($auth->hasIdentity()) {
//                return;
//            }
//
//            // Redirect to the user login page, as an example
//            $router = $e->getRouter();
//            $url = $router->assemble(array(), array(
//                'name' => 'zfcuser/login'
//            ));
//
//            $response = $e->getResponse();
//            $response->getHeaders()->addHeaderLine('Location', $url);
//            $response->setStatusCode(302);
//
//            return $response;
//        }, -100);
    }

    public function checkLogin($e) {

        $auth = $e->getApplication()->getServiceManager()->get("Zend\Authentication\AuthenticationService");
        $target = $e->getTarget();
        $match = $e->getRouteMatch();
print_r($match); exit;
        $controller = $match->getParam('controller');

        if (!in_array($controller, $this->whitelist)) {
            if (!$auth->hasIdentity()) {
                return $target->redirect()->toUrl('/login');
            }
        }
    }

}
