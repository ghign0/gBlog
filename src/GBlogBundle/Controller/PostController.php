<?php

namespace GBlogBundle\Controller;

use GBlogBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Post controller.
 *
 * @Route("admin/post")
 */
class PostController extends Controller
{
    /**
     * Lists all post entities.
     *
     * @Route("/", name="posts_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('GBlogBundle:Post')->findAll();

        return $this->render('@gBlogTemplate/admin/post/index.html.twig', array(
            'posts' => $posts,
        ));
    }

    /**
     * Creates a new post entity.
     *
     * @Route("/new", name="post_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        # get all media media
        $em = $this->getDoctrine()->getManager();
        $mediaList = $em->getRepository('GBlogBundle:Media')->findAll();

        $post = new Post();
        $form = $this->createForm('GBlogBundle\Form\PostType', $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('posts_index');
        }

        return $this->render('@gBlogTemplate/admin/post/new.html.twig', array(
            'post' => $post,
            'mediaList' => $mediaList,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a post entity.
     *
     * @Route("/{id}", name="post_show")
     * @Method("GET")
     */
    public function showAction(Post $post)
    {
        $deleteForm = $this->createDeleteForm($post);

        $testo = $this->prepareForWeb($post->getContent());

        return $this->render('@gBlogTemplate/admin/post/show.html.twig', array(
            'post' => $post,
            'testo' => $testo,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing post entity.
     *
     * @Route("/{id}/edit", name="post_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Post $post)
    {

        # get all media media
        $em = $this->getDoctrine()->getManager();
        $mediaList = $em->getRepository('GBlogBundle:Media')->findAll();

        $deleteForm = $this->createDeleteForm($post);
        $editForm = $this->createForm('GBlogBundle\Form\PostType', $post);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('posts_index');
        }

        return $this->render('@gBlogTemplate/admin/post/edit.html.twig', array(
            'post' => $post,
            'mediaList' => $mediaList,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a post entity.
     *
     * @Route("/{id}", name="post_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Post $post)
    {
        $form = $this->createDeleteForm($post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
        }

        return $this->redirectToRoute('post_index');
    }

    /**
     * Creates a form to delete a post entity.
     *
     * @param Post $post The post entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Post $post)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('post_delete', array('id' => $post->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    public function prepareForWeb ( $content )
    {
        $content = nl2br($content);

        # regex = all'interno delle quadre \[ \]  prendo ogni singolo carattere [] tranne la quadra ^\] per 0 o più volte *
        # quindi => '/\[[^\]]*\]/'
        # ora ho un array con tutti i media.
        preg_match_all('/\[media=(\d*)\s*,\s*\[([^\]]*)\]\s*\]/', $content , $mediaList, PREG_SET_ORDER);

        foreach ($mediaList as $mediaItem) {
            print_r($mediaItem);
        }

        # prendo da db i media che mi servono
        $mediaList = $this->getDoctrine()->getManager()->getRepository('GBlogBundle:Media')->findBy(['placeholder' => ['ibrre', 'android_secret_code']] );
        //var_dump($mediaList);

        return $content;
    }
}
