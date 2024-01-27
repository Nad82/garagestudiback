<?php

namespace App\DataFixtures;

use App\Entity\Vehicule;
use App\Entity\Employe;
use App\Entity\FormulaireG;
use App\Entity\FormulaireV;
use App\Entity\Horaires;
use App\Entity\Services;
use App\Entity\Temoignage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordHasherInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    const DEFAULT_HORAIRES = '8h-12h 14h-18h';

    public function load(ObjectManager $manager): void
    {
        # Vehicule

        $vehicule1 = new Vehicule();
        $vehicule1->setPrix('3500');
        $vehicule1->setKilometrage('250000');
        $vehicule1->setAnnee('2005');
        $vehicule1->setEquipements('Climatisation, airbag, vitres électriques');

        $manager->persist($vehicule1);

        $vehicule2 = new Vehicule();
        $vehicule2->setPrix('5000');
        $vehicule2->setKilometrage('150000');
        $vehicule2->setAnnee('2010');
        $vehicule2->setEquipements('Climatisation, airbag, vitres électriques');

        $manager->persist($vehicule2);

        $vehicule3 = new Vehicule();
        $vehicule3->setPrix('8000');
        $vehicule3->setKilometrage('50000');
        $vehicule3->setAnnee('2015');
        $vehicule3->setEquipements('Climatisation, airbag, vitres électriques');

        $manager->persist($vehicule3);

        $vehicule4 = new Vehicule();
        $vehicule4->setPrix('10000');
        $vehicule4->setKilometrage('10000');
        $vehicule4->setAnnee('2020');
        $vehicule4->setEquipements('Climatisation, airbag, vitres électriques');

        $manager->persist($vehicule4);

        $vehicule5 = new Vehicule();
        $vehicule5->setPrix('15000');
        $vehicule5->setKilometrage('10000');
        $vehicule5->setAnnee('2020');
        $vehicule5->setEquipements('Climatisation, airbag, vitres électriques');

        $manager->persist($vehicule5);

        # Employe

        $employe1 = new Employe();
        $employe1->setEmail('v.parrot@gmail.com');
        $employe1->setPassword($this->passwordEncoder->hashPassword($employe1, 'vehicule77stop'));
        $role = ['ROLE_USER', 'ROLE_ADMIN'];
        $employe1->setRoles($role);
        $manager->persist($employe1);

        $employe2 = new Employe();
        $employe2->setEmail('accumsan.interdum@icloud.org');
        $employe2->setPassword($this->passwordEncoder->hashPassword($employe2, 'accumsan.interdum'));
        $role = ['ROLE_USER'];
        $employe2->setRoles($role);
        $manager->persist($employe2);

        $employe3 = new Employe();
        $employe3->setEmail('depotoir90@gmail.fr');
        $employe3->setPassword($this->passwordEncoder->hashPassword($employe3, 'depotoir90'));
        $role = ['ROLE_USER'];
        $employe3->setRoles($role);
        $manager->persist($employe3);

        $employe4 = new Employe();
        $employe4->setEmail('velit.justo@icloud.com');
        $employe4->setPassword($this->passwordEncoder->hashPassword($employe4, 'velit.justo'));
        $role = ['ROLE_USER'];
        $employe4->setRoles($role);
        $manager->persist($employe4);

        $employe5 = new Employe();
        $employe5->setEmail('proin.ultrices.duis@icloud.ca');
        $employe5->setPassword($this->passwordEncoder->hashPassword($employe5, 'proin.ultrices.duis'));
        $role = ['ROLE_USER'];
        $employe5->setRoles($role);
        $manager->persist($employe5);

        $employe6 = new Employe();
        $employe6->setEmail('vitae.orci@protonmail.couk');
        $employe6->setPassword($this->passwordEncoder->hashPassword($employe6, 'vitae.orci'));
        $role = ['ROLE_USER'];
        $employe6->setRoles($role);
        $manager->persist($employe6);

        $employe7 = new Employe();
        $employe7->setEmail('class.aptent@protonmail.org');
        $employe7->setPassword($this->passwordEncoder->hashPassword($employe7, 'class.aptent'));
        $role = ['ROLE_USER'];
        $employe7->setRoles($role);
        $manager->persist($employe7);

        $employe8 = new Employe();
        $employe8->setEmail('vehicule77start@gmail.com');
        $employe8->setPassword($this->passwordEncoder->hashPassword($employe8, 'vehicule77start'));
        $role = ['ROLE_USER'];
        $employe8->setRoles($role);
        $manager->persist($employe1);

        #FormulaireG

        $formulaireG1 = new FormulaireG();
        $formulaireG1->setNom('Jean');
        $formulaireG1->setPrenom('Dupont');
        $formulaireG1->setEmail('dupontjean@gmail.fr');
        $formulaireG1->setTelephone('0606062606');
        $formulaireG1->setMessage('Bonjour, Faites vous des réparations sur les voitures de type Lan Rover?');
        $manager->persist($formulaireG1);

        $formulaireG2 = new FormulaireG();
        $formulaireG2->setNom('Pierre');
        $formulaireG2->setPrenom('Martin');
        $formulaireG2->setEmail('pierremartin@gmailcom');
        $formulaireG2->setTelephone('0606060606');
        $formulaireG2->setMessage('Bonjour, Changez-vous les climatisations?');
        $manager->persist($formulaireG2);

        $formulaireG3 = new FormulaireG();
        $formulaireG3->setNom('Nuloir');
        $formulaireG3->setPrenom('Rose');
        $formulaireG3->setEmail('nRose@hotmail.fr');
        $formulaireG3->setTelephone('0765433545');
        $formulaireG3->setMessage('Faites-vous le remplacement des bougies?');
        $manager->persist($formulaireG3);

        $formulaireG4 = new FormulaireG();
        $formulaireG4->setNom('Boitre');
        $formulaireG4->setPrenom('Anna');
        $formulaireG4->setEmail('anna.b@gmail.com');
        $formulaireG4->setTelephone('0657453490');
        $formulaireG4->setMessage('Pouvez-vous faire le changement de ma batterie de ma Mercedes');
        $manager->persist($formulaireG4);

        $formulaireG5 = new FormulaireG();
        $formulaireG5->setNom('Joity');
        $formulaireG5->setPrenom('Eric');
        $formulaireG5->setEmail('ericj@hotmail.fr');
        $formulaireG5->setTelephone('0656789076');
        $formulaireG5->setMessage('Faites-vous l équilbrage des roues avants');
        $manager->persist($formulaireG5);

        $formulaireG6 = new FormulaireG();
        $formulaireG6->setNom('Saze');
        $formulaireG6->setPrenom('Robert');
        $formulaireG6->setEmail('s.rob@msn.fr');
        $formulaireG6->setTelephone('0654908767');
        $formulaireG6->setMessage('Je souhaiterai changer la couleur de ma voiture entièrement');
        $manager->persist($formulaireG6);

        $formulaireG7 = new FormulaireG();
        $formulaireG7->setNom('Jig');
        $formulaireG7->setPrenom('Julie');
        $formulaireG7->setEmail('jj@hotmail.com');
        $formulaireG7->setTelephone('0606060606');
        $formulaireG7->setMessage('0628907656');
        $manager->persist($formulaireG7);

        #FormulaireV

        $formulaireV1 = new FormulaireV();
        $formulaireV1->setVehicule($vehicule1);
        $formulaireV1->setNom('Jean');
        $formulaireV1->setPrenom('Dupont');
        $formulaireV1->setEmail('jeandupont@hotmail.fr');
        $formulaireV1->setTelephone('0606060606');
        $formulaireV1->setMessage('Bonjour, je suis intéressé par votre véhicule');
        $manager->persist($formulaireV1);

        $formulaireV2 = new FormulaireV();
        $formulaireV2->setVehicule($vehicule2);
        $formulaireV2->setNom('Pierre');
        $formulaireV2->setPrenom('Martin');
        $formulaireV2->setEmail('pierremartin@gmailcom');
        $formulaireV2->setTelephone('0606060606');
        $formulaireV2->setMessage('Bonjour, je suis intéressé par votre véhicule');
        $manager->persist($formulaireV2);

        #Horaires

        $horaires = new Horaires();
        $horaires->setLundi(self::DEFAULT_HORAIRES);
        $horaires->setMardi(self::DEFAULT_HORAIRES);
        $horaires->setMercredi(self::DEFAULT_HORAIRES);
        $horaires->setJeudi(self::DEFAULT_HORAIRES);
        $horaires->setVendredi(self::DEFAULT_HORAIRES);
        $horaires->setSamedi(self::DEFAULT_HORAIRES);
        $horaires->setDimanche('Fermé');
        $manager->persist($horaires);

        #Services

        $services = new Services();
        $services->setDescription('Réparation, entretien, vidange');
        $manager->persist($services);

        #Temoignages

        $temoignage1 = new Temoignage();
        $temoignage1->setNom('Jean');
        $temoignage1->setPrenom('Dupont');
        $temoignage1->setCommentaires('Très bon garage, je recommande !');
        $temoignage1->setNotes('5');
        $temoignage1->setActif('true');
        $manager->persist($temoignage1);

        $temoignage2 = new Temoignage();
        $temoignage2->setNom('Pierre');
        $temoignage2->setPrenom('Martin');
        $temoignage2->setCommentaires('Ma voiture a été réparée en 2 jours, je suis très satisfait !');
        $temoignage2->setNotes('4');
        $temoignage2->setActif('true');
        $manager->persist($temoignage2);

        $temoignage3 = new Temoignage();
        $temoignage3->setNom('Paul');
        $temoignage3->setPrenom('Marie');
        $temoignage3->setCommentaires('Je suis très contente de mon achat !');
        $temoignage3->setNotes('5');
        $temoignage3->setActif('true');
        $manager->persist($temoignage3);

        $temoignage4 = new Temoignage();
        $temoignage4->setNom('Jacques');
        $temoignage4->setPrenom('François');
        $temoignage4->setCommentaires('délai très long pour récupérer ma voiture');
        $temoignage4->setNotes('2');
        $temoignage4->setActif('true');
        $manager->persist($temoignage4);

        $temoignage5 = new Temoignage();
        $temoignage5->setNom('Verty');
        $temoignage5->setPrenom('Samantha');
        $temoignage5->setCommentaires('Super garage');
        $temoignage5->setNotes('5');
        $temoignage5->setActif('true');
        $manager->persist($temoignage5);

        $temoignage6 = new Temoignage();
        $temoignage6->setNom('Grant');
        $temoignage6->setPrenom('Francois');
        $temoignage6->setCommentaires('Ma voiture a été prise en charge correctement');
        $temoignage6->setNotes('4');
        $temoignage6->setActif('true');
        $manager->persist($temoignage6);

        $temoignage7 = new Temoignage();
        $temoignage7->setNom('Souillet');
        $temoignage7->setPrenom('Marie');
        $temoignage7->setCommentaires('La réparation de ma voiture a été longue');
        $temoignage7->setNotes('2');
        $temoignage7->setActif('true');
        $manager->persist($temoignage7);

        $temoignage8 = new Temoignage();
        $temoignage8->setNom('Houille');
        $temoignage8->setPrenom('Gérard');
        $temoignage8->setCommentaires('Le meilleur garage');
        $temoignage8->setNotes('5');
        $temoignage8->setActif('true');
        $manager->persist($temoignage8);

        $temoignage9 = new Temoignage();
        $temoignage9->setNom('Fresio');
        $temoignage9->setPrenom('Angelo');
        $temoignage9->setCommentaires('Satisfait');
        $temoignage9->setNotes('3');
        $temoignage9->setActif('true');
        $manager->persist($temoignage9);

        $manager->flush();
    }
}
