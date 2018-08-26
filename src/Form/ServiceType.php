<?php

namespace App\Form;

use App\Entity\Service;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use App\Entity\TeamMember;

class ServiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $teamMembers = $options['team_members'];
        $builder
            ->add('name')
            ->add('description', TextareaType::class)
            ->add('image_url')
            ->add('image_caption')
            ->add('contact', ChoiceType::class, [
                'choices' => $teamMembers,
                'choice_label' => function($teamMember, $key, $value) {
                    /** @var TeamMember $teamMember */
                    $name = $teamMember->getTitle() . ", " . $teamMember->getFirstName() . " " . $teamMember->getLastName();
                    return $name;
                },
                'group_by' => function($teamMember, $key, $value) {
                    return $teamMember->getTeam()->getName();
                }
            ])
            ->add('save', SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Service::class,
            'team_members' => null
        ]);
    }
}
