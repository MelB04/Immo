<?php

namespace App\Form;

use App\Entity\Immeuble;
use App\Entity\Appartement;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AjouterAppartementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('superficie', NumberType::class, ['attr' => ['class' => 'form-control'], 'label_attr' => ['class' => 'fw-bold']])
            ->add('descriptif', TextareaType::class, ['attr' => ['class' => 'form-control'], 'label_attr' => ['class' => 'fw-bold']])
            ->add('immeuble', EntityType::class, [
                'attr' => ['class' => 'form-select'],
                'label_attr' => ['class' => 'fw-bold'],
                'class' => Immeuble::class,
                'choice_label' => 'nom_immeuble',
                'multiple' => false,
                'expanded' => false,
            ],)
            ->add('categorie', EntityType::class, [
                'attr' => ['class' => 'form-select'],
                'label_attr' => ['class' => 'fw-bold'],
                'class' => Categorie::class,
                'choice_label' => 'libelle_categorie',
                'multiple' => false,
                'expanded' => false,
            ],)
            ->add('Ajouter', SubmitType::class, ['attr' => ['class' => 'btn bg-primary text-white m-4'], 'row_attr' => ['class' => 'text-center'],])
        ;
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Appartement::class,
        ]);
    }
}
