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
     * list all categories with posts
     * @Route("categories", name="categories")
     * @Method("GET")
     * @return [type] [description]
     */
    public function categoriesAction()
    {
        return $this->render('@template/categories.html.twig', []);
    }


    /**
     * list all post by category
     * @Route("{category}", name="view_posts_by_cateogry")
     * @Method("GET")
     * @return [type] [description]
     */
    public function categoryAction( $category )
    {
        $cat = new Category();
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository('GBlogBundle:Category')->findOneBy(['name' => $category]);
        $postList = $em->getRepository('GBlogBundle:Post')->findBy(['category' => $cat->getId() ]);
        $categories = $em->getRepository('GBlogBundle:Category')->findAll();
        return $this->render('@template/index.html.twig' ,[
            'postList' => $postList,
            'categories' => $categories
        ]);
    }


    /**
     * [viewPostAction description]
     * @param  Post   $post [description]
     * @return [type]       [description]
     *
     * @Route("{category}/{slug}", name="view_post" )
     * @Method("GET")
     */
    public function viewPostAction ( $category , $slug )
    {
        $post = new Post();
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('GBlogBundle:Post')->findOneBy(['slug' => $slug ]);

        return ($post->getCategory()->getName() === $category ) ?
            $this->render('@template/post.html.twig', [
                'post' => $post
            ]) :
            $this->render('@template/errors/404.html.twig');
    }


}
