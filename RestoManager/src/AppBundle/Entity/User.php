<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository") is required.
 * @ORM\Table(name="new_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="urlimage", type="text", nullable=true)
     */
    private $urlimage;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set urlimage
     *
     * @param string $urlimage
     *
     * @return User
     */
    public function setUrlimage($urlimage)
    {
        $this->urlimage = $urlimage;

        return $this;
    }

    /**
     * Get urlimage
     *
     * @return string
     */
    public function getUrlimage()
    {
        return $this->urlimage;
    }
}
