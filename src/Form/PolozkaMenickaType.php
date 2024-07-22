<?php

namespace App\Form;

use App\Entity\PolozkaMenicka;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Jidla;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PolozkaMenickaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('jidla', EntityType::class, [
                'class' => Jidla::class,
                'choice_label' => 'nazev',
                'multiple' => true,
                'expanded' => true,
                'label' => 'Jídla',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PolozkaMenicka::class,
        ]);
    }
}
