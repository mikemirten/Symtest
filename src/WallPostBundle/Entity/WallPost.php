<?php

namespace WallPostBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * WallPost
 *
 * @ORM\Table(name = "wall_posts")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class WallPost
{
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="string", length=255)
	 * @Assert\Length(min = 10, max = 40)
	 */
	private $title;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="author", type="string", length=255, nullable=true)
	 */
	private $author;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="body", type="text")
	 */
	private $body;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="create_date", type="datetime")
	 */
	private $createDate;


	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Set title
	 *
	 * @param string $title
	 * @return WallPost
	 */
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Get title
	 *
	 * @return string 
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set author
	 *
	 * @param string $author
	 * @return WallPost
	 */
	public function setAuthor($author)
	{
		$this->author = $author;

		return $this;
	}

	/**
	 * Get author
	 *
	 * @return string 
	 */
	public function getAuthor()
	{
		return $this->author;
	}

	/**
	 * Set body
	 *
	 * @param string $body
	 * @return WallPost
	 */
	public function setBody($body)
	{
		$this->body = $body;

		return $this;
	}

	/**
	 * Get body
	 *
	 * @return string 
	 */
	public function getBody()
	{
		return $this->body;
	}

	/**
	 * Set createDate
	 *
	 * @param \DateTime $createDate
	 * @return WallPost
	 */
	public function setCreateDate($createDate)
	{
		$this->createDate = $createDate;

		return $this;
	}

	/**
	 * Get createDate
	 *
	 * @return \DateTime 
	 */
	public function getCreateDate()
	{
		return $this->createDate;
	}

	/**
	 * @ORM\PrePersist
	 */
	public function creteDatetime()
	{
		$this->createDate = new \DateTime();
	}

}
