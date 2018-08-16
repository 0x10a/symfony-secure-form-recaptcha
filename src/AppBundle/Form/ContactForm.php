<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactForm extends AbstractType
{
    //Form builder
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //First Name
            ->add('firstName',TextType::class,['label' => 'First Name'])
            //Last Name
            ->add('lastName',TextType::class,['label' => 'Last Name'])
            //Phone Number
            ->add('phoneNumber',TextType::class,['label' => 'Phone Number'])
            //Email
            ->add('email',EmailType::class,['label' => 'Email'])
            //Subject
            ->add('subject',ChoiceType::class,['label' => 'Subject','choices' => [
                // You can add new choices here
                'Customer Service' => 'Customer Service',
                'Feedback' => 'Feedback',
                'Support' => 'Support'
            ]])
            //Message
            ->add('message',TextareaType::class,['label' => 'Message']);
    }

}
