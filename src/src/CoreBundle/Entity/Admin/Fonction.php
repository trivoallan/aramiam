<?php
namespace CoreBundle\Entity\Admin;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Table(name="core_admin_fonctions")
 * @ORM\Entity(repositoryClass="CoreBundle\Repository\Admin\FonctionRepository")
 */
class Fonction
{
    /** @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /** @var string
     * @ORM\Column(name="fonction_name", type="string", length=200, nullable=false, unique=true)
     */
    protected $name;

    /** @var string
     * @ORM\Column(type="string")
     */
    protected $shortName;

    /** @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $nameInCompany;

    /** @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $nameInOdigo;

    /** @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $nameInSalesforce;

    /** @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $nameInZendesk;

    /** @var string
     * @ORM\Column(type="string", length=200, nullable=true)
     */
    protected $nameInActiveDirectory;

    /**
     * @var string
     * @ORM\Column(type="integer", length=1, nullable=true, options={"default":0})
     */
    protected $isArchived;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $createdAt;

    /**
     * @var DateTime
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Fonction
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Fonction
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     * @return Fonction
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameInCompany()
    {
        return $this->nameInCompany;
    }

    /**
     * @param string $nameInCompany
     * @return Fonction
     */
    public function setNameInCompany($nameInCompany)
    {
        $this->nameInCompany = $nameInCompany;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameInOdigo()
    {
        return $this->nameInOdigo;
    }

    /**
     * @param string $nameInOdigo
     * @return Fonction
     */
    public function setNameInOdigo($nameInOdigo)
    {
        $this->nameInOdigo = $nameInOdigo;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameInSalesforce()
    {
        return $this->nameInSalesforce;
    }

    /**
     * @param string $nameInSalesforce
     * @return Fonction
     */
    public function setNameInSalesforce($nameInSalesforce)
    {
        $this->nameInSalesforce = $nameInSalesforce;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameInZendesk()
    {
        return $this->nameInZendesk;
    }

    /**
     * @param string $nameInZendesk
     * @return Fonction
     */
    public function setNameInZendesk($nameInZendesk)
    {
        $this->nameInZendesk = $nameInZendesk;
        return $this;
    }

    /**
     * @return string
     */
    public function getNameInActiveDirectory()
    {
        return $this->nameInActiveDirectory;
    }

    /**
     * @param string $nameInActiveDirectory
     * @return Fonction
     */
    public function setNameInActiveDirectory($nameInActiveDirectory)
    {
        $this->nameInActiveDirectory = $nameInActiveDirectory;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return Fonction
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     * @return Fonction
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsArchived()
    {
        return $this->isArchived;
    }

    /**
     * @param string $isArchived
     * @return Fonction
     */
    public function setIsArchived($isArchived)
    {
        $this->isArchived = $isArchived;
        return $this;
    }
}