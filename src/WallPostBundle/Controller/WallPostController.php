<?php

namespace WallPostBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WallPostBundle\Entity\WallPost;

class WallPostController extends Controller
{
	public function indexAction()
	{
		$posts = $this->getDoctrine()
			->getRepository('WallPostBundle:WallPost')
			->createQueryBuilder('posts')
			->orderBy('posts.createDate', 'DESC')
			->getQuery()
			->getResult();
		
		$form = $this->createForm($this->get('wallpost.form.post'), null, [
			'action' => $this->generateUrl('wallpost.create')
		]);
		
		return $this->render('WallPostBundle:WallPost:index.html.twig', [
			'posts'    => $posts,
			'postForm' => $form->createView()
		]);

	}

	public function createAction(Request $request)
	{
		$post = new WallPost();
		$form = $this->createForm($this->get('wallpost.form.post'), $post, [
			'action' => $this->generateUrl('wallpost.create')
		]);
		
		$form->handleRequest($request);
		
		if ($form->isValid()) {
			$manager = $this->getDoctrine()->getManager();
			
			$manager->persist($post);
			$manager->flush();
			
			return $this->redirect($this->generateUrl('wallpost.index'));
		}
		
		return $this->render('WallPostBundle:WallPost:create.html.twig', [
			'postForm' => $form->createView()
		]);
	}
}
