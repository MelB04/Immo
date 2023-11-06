<?php

namespace App\Entity;

use App\Repository\AvoirPourTarifRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvoirPourTarifRepository::class)]
class AvoirPourTarif
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prixSemaine = null;

    #[ORM\ManyToOne(inversedBy: 'avoirPourTarifs')]
    private ?Saison $saison = null;

    #[ORM\ManyToOne(inversedBy: 'avoirPourTarifs')]
    private ?Categorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixSemaine(): ?float
    {
        return $this->prixSemaine;
    }

    public function setPrixSemaine(float $prixSemaine): static
    {
        $this->prixSemaine = $prixSemaine;

        return $this;
    }

    public function getSaison(): ?Saison
    {
        return $this->saison;
    }

    public function setSaison(?Saison $saison): static
    {
        $this->saison = $saison;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

}
