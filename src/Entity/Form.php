<?php

namespace GenerateFormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Form
 *
 * @ORM\Table(name="form")
 * @ORM\Entity
 */
class Form
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Fields", mappedBy="form")
     */
    private $fields;

    /**
     * Form constructor.
     */
    public function __construct($title,$description, $dateModif)
    {
        $this->title= $title;
        $this->description= $description;
        $this->dateModif= $dateModif;
        $this->fields = new ArrayCollection();
    }

    /**
     * @return Collection|Fields[]
     */
    public function getFields() :Collection
    {
        return $this->fields;
    }

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_modif", type="datetime", nullable=true)
     */
    private $dateModif;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateModif(): ?\DateTime
    {
        return $this->dateModif;
    }

    /**
     * @param \DateTime|null $dateModif
     */
    public function setDateModif(?\DateTime $dateModif): void
    {
        $this->dateModif = $dateModif;
    }


}
