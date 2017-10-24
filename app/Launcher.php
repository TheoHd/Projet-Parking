<?php
namespace App;

use PPEParking\Controllers\Profile;
use PPEParking\Controllers\Home;
use PPEParking\Controllers\Login;
use PPEParking\Controllers\RegisterApplication;
use PPEParking\Controllers\ApplyRegisterApp;
use PPEParking\Controllers\NotFound;
use PPEParking\Controllers\SlotApplications;
use PPEParking\Controllers\ParkingScheme;
use PPEParking\Controllers\Disconnect;

/**
 * Class Launcher
 * @package App
 */
class Launcher
{
    private $page;

    /**
     * Launcher constructor.
     */
    public function __construct(){
        $this->page = "";
    }
    /**
     *@var
     *Retrieve and require the controller
     */
    public function start()
	{
        if(!isset($_GET['page']) || $_GET['page'] == "")
        {
            $this->setPage('home');
            $this->controllerInit($this->getPage());
        }
        else
        {
            if(!file_exists("src/PPEParking/Controllers/".ucfirst($_GET['page']).".php"))
            {
                $this->setPage('notFound');
                $this->controllerInit($this->getPage());
            }
            else
            {
                $this->setPage($_GET['page']);
                $this->controllerInit($this->getPage());
            }
        }
    }
    /**
     * @param $page
     */
    public function controllerInit($page){
        if($page == 'home'){
            $homeController = new Home();
            $homeController->start();
        }
        if($page == 'login'){
            $loginController = new Login();
            $loginController->start();
        }
        if($page == 'parkingScheme'){
            $parkingSchemeController = new ParkingScheme();
            $parkingSchemeController->start();
        }
        if($page == 'slotApplications'){
            $slotApplicationsController = new SlotApplications();
            $slotApplicationsController->start();
        }
        if($page == 'applyRegisterApp'){
            $applyRegisterAppController = new ApplyRegisterApp();
            $applyRegisterAppController->start();
        }
        if($page == 'profile'){
            $profileController = new Profile();
            $profileController->start();
        }
        if($page == 'registerApplication'){
            $registerApplicationController = new RegisterApplication();
            $registerApplicationController->start();
        }
        if($page == 'disconnect'){
            $disconnectController = new Disconnect();
            $disconnectController->start();
        }
        if($page == 'notFound'){
            $notFoundController = new NotFound();
            $notFoundController->start();
        }
    }
    /**
     * @param $page
     */
    public function setPage($page){
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getPage(){
        return $this->page;
    }
}
