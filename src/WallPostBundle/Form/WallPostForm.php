<?php

namespace WallPostBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WallPostForm extends AbstractType
{
	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder
			->add('title', 'text', [
				'label' => 'Title'
			])
			->add('author', 'text', [
				'label'    => 'Author',
				'required' => false
			])
			->add('body', 'textarea', [
				'label' => 'Message'
			])
			->add('submit', 'submit');
	}

	/**
	 * @param OptionsResolverInterface $resolver
	 */
	public function setDefaultOptions(OptionsResolverInterface $resolver)
	{
		$resolver->setDefaults([
			'method'     => 'post',
			'data_class' => 'WallPostBundle\Entity\WallPost'
		]);
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'wallpost_post';
	}
}
