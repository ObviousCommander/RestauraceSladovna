<?php
namespace App\Form;

use App\DTO\PolozkaMenickaDto;
use App\Entity\PolozkaMenicka;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Jidla;

class PolozkaMenickaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('jidla', EntityType::class, [
            'class' => Jidla::class,
            'choice_label' => 'nazev',
            'placeholder' => 'Vyberte jídlo',
            'attr' => ['class' => 'form-control'],
        ])
        ->add('remove', ButtonType::class, [
            'label' => 'Odebrat',
            'attr' => ['class' => 'btn btn-danger', 'onClick' => 'confirmRemove()'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PolozkaMenicka::class,
        ]);
    }
}