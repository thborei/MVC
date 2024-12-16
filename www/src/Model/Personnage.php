<?php

namespace App\Model;

class Personnage
{
    protected ?int $id; // ID peut être null
    protected string $nom;
    protected int $PV;
    protected int $PVMax;
    protected int $force;
    protected int $facesDe;
    protected int $chance;
    protected int $XP = 0;
    protected int $money;
    protected string $avatar;
    protected string $classe;

    public function __construct(
        string $nom,
        int $PV,
        int $PVMax,
        int $force,
        int $facesDe = 6,
        int $chance = 50,
        int $money = 100,
        string $avatar = 'avatar.jpg',
        int $XP = 0,
        ?int $id = null
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->PV = $PV;
        $this->PVMax = $PVMax;
        $this->force = $force;
        $this->facesDe = $facesDe;
        $this->chance = $chance;
        $this->money = $money;
        $this->avatar = "/img/$avatar";
        $this->classe = "Personnage";
        $this->XP = $XP;
    }

    public function isAlive()
    {
        return $this->PV > 0;
    }

    // Commencez à typer les propriétés pour éviter les erreurs
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPV(): ?int
    {
        return $this->PV;
    }

    public function setPV(int $PV): void
    {
        $this->PV = $PV;
    }

    public function getPVMAX(): ?int
    {
        return $this->PVMax;
    }

    public function setPVMax(int $PVMax): void
    {
        $this->PVMax = $PVMax;
    }

    public function getNom(): string
    {
        return strtoupper($this->nom);
    }

    public function setNom(string $nom): void
    {
        $this->nom = trim($nom);
    }
    public function getForce(): ?int
    {
        return $this->force;
    }

    public function setForce(int $force): void
    {
        $this->force = $force;
    }

    public function getXp()
    {
        return $this->XP;
    }

    public function gagnerXP($XP)
    {
        $this->XP += $XP;
    }

    public function levelUp()
    {
        // A IMPLEMENTER
    }

    public function getClasse()
    {
        return $this->classe;
    }

    public function getfacesDe(): ?int
    {
        return $this->facesDe;
    }

    public function setfacesDe(int $facesDe): void
    {
        $this->facesDe = $facesDe;
    }
    public function getchance(): ?int
    {
        return $this->chance;
    }

    public function setchance(int $chance): void
    {
        $this->chance = $chance;
    }
    public function getmoney(): ?int
    {
        return $this->money;
    }

    public function setmoney(int $money): void
    {
        $this->money = $money;
    }
    public function getavatar(): string
    {
        return $this->avatar;
    }

    public function setavatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }
    public function attaquer(Personnage $cible)
    {

        // On lance le dé
        $scoreDe = rand(1, $this->facesDe);

        $resultat = "$this->nom lance son dé à $this->facesDe faces et obtient $scoreDe\n";

        // On ramène à une chiffre entre 0 et 1
        $factDe = $scoreDe / $this->facesDe;
        // On ajoute la chance
        $factChance = $this->chance / 100;
        // On fait une moyenne entre le dé et la chance
        $chanceFinale = ($factDe + $factChance) / 2;

        // Si le calcul est inférieur à 0.5, on rate l'attaque
        $success = $chanceFinale > 0.5;

        if (!$success) {
            $resultat .= "$this->nom rate son attaque !\n";
            return $resultat;
        } else {
            $resultat .= "$this->nom attaque $cible->nom! GRAOUUUU !\n";
            $resultat .= "$cible->nom perd $this->force PV !\n";
            $cible->PV -= $this->force;
            $resultat .= "$cible->nom a maintenant $cible->PV PV restants !\n";
        }

        return $resultat;
    }

    function ressurect()
    {
        $this->PV = $this->PVMax;
    }
}
