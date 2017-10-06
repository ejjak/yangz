<?php
/**
 * Created by PhpStorm.
 * User: Demi
 * Date: 06-Oct-17
 * Time: 11:45 AM
 */
namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render(':page:index.html.twig');
    }
}