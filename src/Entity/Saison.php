<?php

namespace App\Entity;

use App\Repository\SaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaisonRepository::class)]
class Saison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleSaison = null;

    #[ORM\OneToMany(mappedBy: 'saison', targetEntity: AvoirPourTarif::class)]
    private Collection $avoirPourTarifs;

    #[ORM\OneToMany(mappedBy: 'saison', targetEntity: Semaine::class)]
    private Collection $semaines;

    public function __construct()
    {
        $this->avoirPourTarifs = new ArrayCollection();
        $this->semaines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleSaison(): ?string
    {
        return $this->libelleSaison;
    }

    public function setLibelleSaison(string $libelleSaison): static
    {
        $this->libelleSaison = $libelleSaison;

        return $this;
    }

    /**
     * @return Collection<int, AvoirPourTarif>
     */
    public function getAvoirPourTarifs(): Collection
    {
        return $this->avoirPourTarifs;
    }

    public function addAvoirPourTarif(AvoirPourTarif $avoirPourTarif): static
    {
        if (!$this->avoirPourTarifs->contains($avoirPourTarif)) {
            $this->avoirPourTarifs->add($avoirPourTarif);
            $avoirPourTarif->setSaison($this);
        }

        return $this;
    }

    public function removeAvoirPourTarif(AvoirPourTarif $avoirPourTarif): static
    {
        if ($this->avoirPourTarifs->removeElement($avoirPourTarif)) {
            // set the owning side to null (unless already changed)
            if ($avoirPourTarif->getSaison() === $this) {
                $avoirPourTarif->setSaison(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Semaine>
     */
    public function getSemaines(): Collection
    {
        return $this->semaines;
    }

    public function addSemaine(Semaine $semaine): static
    {
        if (!$this->semaines->contains($semaine)) {
            $this->semaines->add($semaine);
            $semaine->setSaison($this);
        }

        return $this;
    }

    public function removeSemaine(Semaine $semaine): static
    {
        if ($this->semaines->removeElement($semaine)) {
            // set the owning side to null (unless already changed)
            if ($semaine->getSaison() === $this) {
                $semaine->setSaison(null);
            }
        }

        return $this;
    }
}
