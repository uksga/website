<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Team;

class TeamMemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name')
            ->add('last_name')
            ->add('email')
            ->add('title')
            ->add('office_hours')
            ->add('team', EntityType::class, array(
                'class' => Team::class,
                'choice_label' => 'name',
                'label' => 'Select a Team'
            ))
            ->add('is_vip')
            ->add('profile_image', FileType::class, array('label' => 'Upload Profile Image (.jpg)', 'data_class' => null))
            ->add('save', SubmitType::class)
        ;
    }
}