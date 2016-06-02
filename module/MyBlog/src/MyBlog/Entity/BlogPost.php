<?php

namespace MyBlog\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Description of BlogPost
 * @ORM\Entity
 * @author ecofreeon
 */
class BlogPost
{
    /**
   * @var int
   * @ORM\Id
   * @ORM\Column(type="integer")
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @var string
   * @ORM\Column(type="string", length=255, nullable=false)
   */
  protected $title;

  /**
   * Get id.
   *
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set id.
   *
   * @param int $id
   *
   * @return void
   */
  public function setId($id)
  {
    $this->id = (int) $id;
  }

  /**
   * Get title.
   *
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set title.
   *
   * @param string $title
   *
   * @return void
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
}
