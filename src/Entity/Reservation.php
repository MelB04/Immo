<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateReserv = null;

    #[ORM\Column(length: 255)]
    private ?string $nomClient = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomClient = null;

    #[ORM\Column(length: 255)]
    private ?string $rueClient = null;

    #[ORM\Column]
    private ?int $cpClient = null;

    #[ORM\Column(length: 255)]
    private ?string $villeClient = null;

    #[ORM\Column]
    private ?int $telClient = null;

    #[ORM\Column]
    private ?int $numChequeCompte = null;

    #[ORM\Column]
    private ?float $montantAcompte = null;

    #[ORM\Column]
    private ?int $etatReserv = null;

    #[ORM\ManyToMany(targetEntity: Semaine::class, inversedBy: 'reservations')]
    private Collection $semaine;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Appartement $appartement = null;

    public function __construct()
    {
        $this->semaine = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateReserv(): ?\DateTimeInterface
    {
        return $this->dateReserv;
    }

    public function setDateReserv(\DateTimeInterface $dateReserv): static
    {
        $this->dateReserv = $dateReserv;

        return $this;
    }

    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }

    public function setNomClient(string $nomClient): static
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    public function getPrenomClient(): ?string
    {
        return $this->prenomClient;
    }

    public function setPrenomClient(string $prenomClient): static
    {
        $this->prenomClient = $prenomClient;

        return $this;
    }

    public function getRueClient(): ?string
    {
        return $this->rueClient;
    }

    public function setRueClient(string $rueClient): static
    {
        $this->rueClient = $rueClient;

        return $this;
    }

    public function getCpClient(): ?int
    {
        return $this->cpClient;
    }

    public function setCpClient(int $cpClient): static
    {
        $this->cpClient = $cpClient;

        return $this;
    }

    public function getVilleClient(): ?string
    {
        return $this->villeClient;
    }

    public function setVilleClient(string $villeClient): static
    {
        $this->villeClient = $villeClient;

        return $this;
    }

    public function getTelClient(): ?int
    {
        return $this->telClient;
    }

    public function setTelClient(int $telClient): static
    {
        $this->telClient = $telClient;

        return $this;
    }

    public function getNumChequeCompte(): ?int
    {
        return $this->numChequeCompte;
    }

    public function setNumChequeCompte(int $numChequeCompte): static
    {
        $this->numChequeCompte = $numChequeCompte;

        return $this;
    }

    public function getMontantAcompte(): ?float
    {
        return $this->montantAcompte;
    }

    public function setMontantAcompte(float $montantAcompte): static
    {
        $this->montantAcompte = $montantAcompte;

        return $this;
    }

    public function getEtatReserv(): ?int
    {
        return $this->etatReserv;
    }

    public function setEtatReserv(int $etatReserv): static
    {
        $this->etatReserv = $etatReserv;

        return $this;
    }

    /**
     * @return Collection<int, Semaine>
     */
    public function getSemaine(): Collection
    {
        return $this->semaine;
    }

    public function addSemaine(Semaine $semaine): static
    {
        if (!$this->semaine->contains($semaine)) {
            $this->semaine->add($semaine);
        }

        return $this;
    }

    public function removeSemaine(Semaine $semaine): static
    {
        $this->semaine->removeElement($semaine);

        return $this;
    }

    public function getAppartement(): ?Appartement
    {
        return $this->appartement;
    }

    public function setAppartement(?Appartement $appartement): static
    {
        $this->appartement = $appartement;

        return $this;
    }
}
