<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class LearningController extends AbstractController
{
    private $name;

    private function name() {
        return $this->name;
    }

    /**
     * @Route("/aboutMe", name="aboutMe")
     */
    public function aboutMe()
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController'
        ]);
    }

    /**
     * @Route("/", name="showMyName")
     */
    public function showMyName()
    {
        if (!isset($_SESSION['name'])) {
            $_SESSION['name'] = 'undefined';
        }
        return $this->render('learning/showMyName.html.twig', [
            'controller_name' => 'LearningController',
        'name' => $_SESSION['name'],
        ]);
    }

    /**
     * @Route("/changeMyName", name="changeMyName")
     */
    public function changeMyName()
    {
        if (!isset($_POST['name'])) {
            $_POST['name'] = "undefined";
        }

        if (isset($_SESSION['name'])) {
            $_SESSION['name'] = $_POST['name'];
            $this->name = $_SESSION['name'];
        }

        return $this->render('learning/changeMyName.html.twig', [
            'controller_name' => 'LearningController',
            'name' => $this->name
        ]);
    }
}
