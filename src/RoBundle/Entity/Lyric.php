<?php
namespace RoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ro3_lyrics_lyric")
 * @ORM\Entity()
 */
class Lyric
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Lyrics
     * @ORM\ManyToOne(targetEntity="RoBundle\Entity\Lyrics", inversedBy="lyricList")
     * @ORM\JoinColumn(name="lyrics_id", referencedColumnName="id")
     */
    private $lyrics;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    public function getId()
    {
        return $this->id;
    }

    public function getLyrics()
    {
        return $this->lyrics;
    }

    /**
     * @param Lyrics $lyrics
     * @return Lyric
     */
    public function setLyrics($lyrics)
    {
        $this->lyrics = $lyrics;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Lyric
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Lyric
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}
