<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    private $name ;
    /**
     * @Route("/aboutMe", name="aboutMe")
     */
    public function aboutMe() {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController'
        ]);
    }

    public function name() {
        return $this->name;
    }

    /**
     * @Route("/showMyName", name="showMyName")
     */
    public function showMyName(){
        return $this->render('learning/showMyName.html.twig', [
            'controller_name' => 'LearningController',
            'name' => $this->name(),
        ]);
    }


    /**
     * @Route("/", name="changeMyName")
     */
    public function changeMyName() {
        if (!isset($_POST['name'])) {
            $_POST['name']= "undefined";
        }
        $this->name = $_POST['name'];
        return $this->render('learning/changeMyName.html.twig', [
            'controller_name' => 'LearningController',
            'name' => $this->name()
        ]);
    }


}
