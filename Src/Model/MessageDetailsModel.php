<?php

namespace App\Src\Model;

use DateTime;

class MessageDetailsModel extends Models
{
    protected $id;
    protected $pseudo;
    protected $illustration;
    protected $subject;
    protected $text;
    protected $publication;
    protected $id_subjectDetails;
    protected $id_message;

    public function __construct()
    {
        $this->table = "message_details";
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }
    public function getIllustration()
    {
        return $this->illustration;
    }
    public function setIllustration(string $illustration)
    {
        $this->illustration = $illustration;
        return $this;
    }
    public function getSubject()
    {
        return $this->subject;
    }
    public function setSubject(string $subject)
    {
        $this->subject = $subject;
        return $this;
    }
    public function getText()
    {
        return $this->text;
    }
    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }
    public function getPublication()
    {
        return $this->publication;
    }
    public function setPublication($publication)
    {
        $this->publication = $publication;
        return $this;
    }

    public function getIdSubjectDetails()
    {
        return $this->id_subjectDetails;
    }

    public function setIdSubjectDetails(int $id_subjectDetails)
    {

        $this->id_subjectDetails = $id_subjectDetails;
        return $this;
    }

    public function getIdMessage()
    {
        return $this->id_message;
    }
    public function setIdMessage(int $id_message)
    {
        $this->id_message = $id_message;
        return $this;
    }
}
