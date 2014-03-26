<?php
// src/Acme/TeamBundle/Entity/User.php

namespace Acme\TeamBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 *
 */
class User
{

    /**
     * @ORM\ManyToMany(targetEntity="Team", inversedBy="users")
     * @ORM\JoinTable(name="users_teams")
     */
    private $teams;

    public function __construct() {
        $this->teams = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $userName;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $password;


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
     * Set userName
     *
     * @param string $userName
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string 
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add teams
     *
     * @param \Acme\TeamBundle\Entity\Team $teams
     * @return User
     */
    public function addTeam(\Acme\TeamBundle\Entity\Team $teams)
    {
        $this->teams[] = $teams;

        return $this;
    }

    /**
     * Remove teams
     *
     * @param \Acme\TeamBundle\Entity\Team $teams
     */
    public function removeTeam(\Acme\TeamBundle\Entity\Team $teams)
    {
        $this->teams->removeElement($teams);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeams()
    {
        return $this->teams;
    }
}
