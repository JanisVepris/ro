<?php
namespace RoBundle\Entity;

use CoreBundle\Traits\CreatedOnEntityTrait;
use CoreBundle\Traits\UpdatedOnEntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ro3_article")
 * @ORM\Entity(repositoryClass="RoBundle\Repository\ArticleRepository")
 */
class Article
{
    use CreatedOnEntityTrait;
    use UpdatedOnEntityTrait;

    /**
     * @var int
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
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var Event
     * @ORM\ManyToOne(targetEntity="RoBundle\Entity\Event", inversedBy="articles")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

    /**
     * @var bool
     * @ORM\Column(name="published", type="boolean")
     */
    private $published = false;

    /**
     * @var ArticleImage
     * @ORM\OneToOne(targetEntity="RoBundle\Entity\ArticleImage", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="article_image_id", referencedColumnName="id")
     */
    private $articleImage;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Article
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
     * Set description
     *
     * @param string $description
     *
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param Event $event
     * @return Article
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    public function isPublished()
    {
        return $this->published;
    }

    /**
     * @param bool $published
     * @return Article
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    public function getArticleImage()
    {
        return $this->articleImage;
    }

    /**
     * @param ArticleImage $articleImage
     * @return Article
     */
    public function setArticleImage($articleImage)
    {
        $this->articleImage = $articleImage;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }
}
