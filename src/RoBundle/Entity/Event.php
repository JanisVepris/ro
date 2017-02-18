<?php

namespace RoBundle\Entity;

use CoreBundle\Traits\UpdatedOnEntityTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use CoreBundle\Traits\CreatedOnEntityTrait;

/**
 * @ORM\Table(name="ro3_event")
 * @ORM\Entity(repositoryClass="RoBundle\Repository\EventRepository")
 */
class Event
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
     * @var \DateTime
     *
     * @ORM\Column(name="event_date", type="datetime", unique=true)
     */
    private $eventDate;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var EventImage
     * @ORM\OneToOne(targetEntity="RoBundle\Entity\EventImage", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="event_image_id", referencedColumnName="id")
     */
    private $eventImage;

    /**
     * @var ArrayCollection|Article[]
     * @ORM\OneToMany(targetEntity="RoBundle\Entity\Article", mappedBy="event", cascade={"persist"})
     */
    private $articles;

    /**
     * @var Poster
     * @ORM\OneToOne(targetEntity="RoBundle\Entity\Poster", mappedBy="event")
     */
    private $poster;

    /**
     * @var Team
     * @ORM\OneToOne(targetEntity="RoBundle\Entity\Team", mappedBy="event")
     */
    private $team;

    /**
     * @var Team
     * @ORM\OneToOne(targetEntity="RoBundle\Entity\Script", mappedBy="event")
     */
    private $script;

    /**
     * @var Team
     * @ORM\OneToOne(targetEntity="RoBundle\Entity\Facts", mappedBy="event")
     */
    private $facts;

    /**
     * @var Gallery
     * @ORM\OneToOne(targetEntity="RoBundle\Entity\Gallery", mappedBy="event")
     */
    private $gallery;

    /**
     * Event constructor.
     */
    public function __construct()
    {
        $this->articles = new ArrayCollection();
    }

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
     * @return Event
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
     * Set eventDate
     *
     * @param \DateTime $eventDate
     *
     * @return Event
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Event
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    public function getEventImage()
    {
        return $this->eventImage;
    }

    /**
     * @param EventImage $eventImage
     * @return Event
     */
    public function setEventImage($eventImage)
    {
        $this->eventImage = $eventImage;

        return $this;
    }

    /**
     * @return ArrayCollection|Article[]
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @param ArrayCollection|Article[] $articles
     * @return Event
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;

        return $this;
    }

    /**
     * @param Article $article
     * @return $this
     */
    public function addArticle(Article $article)
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
        }

        return $this;
    }

    /**
     * @param Article $article
     * @return $this
     */
    public function removeArticle(Article $article)
    {
        if ($this->articles->contains($article)) {
            $this->articles->removeElement($article);
        }

        return $this;
    }

    /**
     * @return Poster
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @param Poster $poster
     * @return Event
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * @return Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param Team $team
     * @return Event
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * @return Team
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * @param Team $script
     * @return Event
     */
    public function setScript($script)
    {
        $this->script = $script;

        return $this;
    }

    /**
     * @return Team
     */
    public function getFacts()
    {
        return $this->facts;
    }

    /**
     * @param Team $facts
     * @return Event
     */
    public function setFacts($facts)
    {
        $this->facts = $facts;

        return $this;
    }

    /**
     * @return Gallery
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param Gallery $gallery
     * @return Event
     */
    public function setGallery($gallery)
    {
        $this->gallery = $gallery;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }
}

