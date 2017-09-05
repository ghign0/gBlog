<?php

namespace GBlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use GBlogBundle\Entity\Post;
use GBlogBundle\Entity\Category;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('GBlogBundle:Category')->findAll();
        $postList = $em->getRepository('GBlogBundle:Post')->findAll();
        return $this->render('@template/index.html.twig', [
            'postList' => $postList,
            'categories' => $categories,
        ]);
    }


    /**
     * list all post by category
     * @Route("category/{name}", name="post_by_category")
     * @Method("GET")
     * @return [type] [description]
     */
    public function categoryAction(Category $category)
    {
        $em = $this->getDoctrine()->getManager();
        $postList = $em->getRepository('GBlogBundle:Post')->findBy(['category' => $category->getId() ]);
        $categories = $em->getRepository('GBlogBundle:Category')->findAll();
        return $this->render('@template/index.html.twig' ,[
            'postList' => $postList,
            'categories' => $categories
        ]);
    }
}
