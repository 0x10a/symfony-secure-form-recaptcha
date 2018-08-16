<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Data
 *
 * @ORM\Table(name="FormData")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DataRepository")
 */
class FormData
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=255)
     *
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="15",maxMessage="First Name Should not exceed 15 Characters")
     * @Assert\Regex(pattern="/^[a-z ,.'-]+$/i",message="First Name should not contain any special symbols or numbers")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=255)
     *
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="15",maxMessage="Last Name Should not exceed 15 Characters")
     * @Assert\Regex(pattern="/^[a-z ,.'-]+$/i",message="Last Name should not contain any special symbols or numbers")
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="PhoneNumber", type="string", length=255)
     *
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="10",min="10",exactMessage="Phone number should be exactly 10 digits long.")
     *
     * Feel Free to change this Regex pattern as per your requirement
     * @Assert\Regex(pattern="/^[0-9]*$/", message=" This is not a valid Phone Number")
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=70)
     *
     *
     * @Assert\NotBlank()
     * @Assert\Email(message="This is not a valid Email Address")
     * @Assert\Length(max="60",maxMessage="This Email is too long, please enter an email with less than 60 characters")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Subject", type="string", length=50)
     * @Assert\Choice(choices={"Customer Service", "Feedback","Support"}, message="Invalid Subject Choice")
     * @Assert\NotBlank()
     */
    private $subject;


    /**
     * @var string
     *
     * @ORM\Column(name="Message", type="string", length=1000)
     *
     *
     * @Assert\NotBlank()
     * @Assert\Length(max="1000",exactMessage="Your message should not be longer than 1000 characters")
     */
    private $message;


    /**
     * @var string
     * @Assert\EqualTo(value=true,message="Please verify recapcha")
     *
     */
    private $recapcha;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return FormData
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return FormData
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     *
     * @return FormData
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return FormData
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return FormData
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $subject
     *
     * @return FormData
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }


    /**
     * @return string
     */
    public function getRecapcha()
    {
        return $this->recapcha;
    }

    /**
     * @param string $recapcha
     *
     *  @return FormData
     */
    public function setRecapcha($recapcha)
    {
        $this->recapcha = $recapcha;

        return $this;
    }

}

