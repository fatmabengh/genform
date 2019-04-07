<?php

namespace GenerateFormBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fields
 *
 * @ORM\Table(name="fields", indexes={@ORM\Index(name="IDX_7EE5E3885FF69B7D", columns={"form_id"})})
 * @ORM\Entity
 */
class Fields
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
     * @ORM\Column(name="label", type="string", length=255, nullable=false)
     */
    private $label;

    /**
     * @var string|null
     *
     * @ORM\Column(name="subtitle", type="string", length=255, nullable=true)
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="types", type="string", length=255, nullable=false)
     */
    private $types;

    /**
     * @var string|null
     *
     * @ORM\Column(name="items", type="string", length=255, nullable=true)
     */
    private $items;

    /**
     * @var \Form
     *
     * @ORM\ManyToOne(targetEntity="Form")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="form_id", referencedColumnName="id")
     * })
     */
    private $form;

    /**
     * Fields constructor.
     * @param string $label
     * @param null|string $subtitle
     * @param string $types
     */
    public function __construct(string $label, ?string $subtitle, string $types)
    {
        $this->label = $label;
        $this->subtitle = $subtitle;
        $this->types = $types;
    }

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
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return null|string
     */
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    /**
     * @param null|string $subtitle
     */
    public function setSubtitle(?string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }

    /**
     * @return string
     */
    public function getTypes(): string
    {
        return $this->types;
    }

    /**
     * @param string $types
     */
    public function setTypes(string $types): void
    {
        $this->types = $types;
    }

    /**
     * @return null|string
     */
    public function getItems(): ?string
    {
        return $this->items;
    }

    /**
     * @param null|string $items
     */
    public function setItems(?string $items): void
    {
        $this->items = $items;
    }

    /**
     * @return \Form
     */
    public function getForm(): \Form
    {
        return $this->form;
    }

    /**
     * @param \Form $form
     */
    public function setForm(\Form $form): void
    {
        $this->form = $form;
    }


}
