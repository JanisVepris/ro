<?php
namespace RoBundle\Entity;

use CoreBundle\Traits\CreatedOnEntityTrait;
use CoreBundle\Traits\UpdatedOnEntityTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ro3_video_playlist_videos")
 * @ORM\Entity()
 * @ORM\HasLifecycleCallbacks()
 */
class Video
{
    use UpdatedOnEntityTrait;
    use CreatedOnEntityTrait;

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="url", type="string")
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @var VideoPlaylist
     * @ORM\ManyToOne(targetEntity="RoBundle\Entity\VideoPlaylist", inversedBy="videos")
     * @ORM\JoinColumn(name="video_playlist_id", referencedColumnName="id")
     */
    private $videoPlaylist;

    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Video
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Video
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getVideoPlaylist()
    {
        return $this->videoPlaylist;
    }

    /**
     * @param VideoPlaylist $videoPlaylist
     * @return Video
     */
    public function setVideoPlaylist($videoPlaylist)
    {
        $this->videoPlaylist = $videoPlaylist;

        return $this;
    }
}
