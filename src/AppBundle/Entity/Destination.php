<?php
namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Destination
 *
 * @ORM\Table(name="destination")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DestinationRepository")
 */
class Destination
{
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
     * @Assert\NotBlank(message="Please provide Destination Name.")
     * @ORM\Column(name="destinationName", type="string", length=255)
     */
    private $destinationName;
    /**
     * @var int
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Packages", mappedBy="destination")
     */
    private $packages;
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
     * Set destinationName
     *
     * @param string $destinationName
     *
     * @return Destination
     */
    public function setDestinationName($destinationName)
    {
        $this->destinationName = $destinationName;
        return $this;
    }
    /**
     * Get destinationName
     *
     * @return string
     */
    public function getDestinationName()
    {
        return $this->destinationName;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->packages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add package
     *
     * @param \AppBundle\Entity\Packages $package
     *
     * @return Destination
     */
    public function addPackage(\AppBundle\Entity\Packages $package)
    {
        $this->packages[] = $package;

        return $this;
    }

    /**
     * Remove package
     *
     * @param \AppBundle\Entity\Packages $package
     */
    public function removePackage(\AppBundle\Entity\Packages $package)
    {
        $this->packages->removeElement($package);
    }

    /**
     * Get packages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPackages()
    {
        return $this->packages;
    }


    public function __toString()
    {
        return $this->getDestinationName();
    }
}
