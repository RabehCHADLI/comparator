<?php

class TourOperator
{
    private int $id;
    private string $name;
    private string $link;
    private bool $certificate;
    private array $reviews;
    private array $scores;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }
    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace(' ', '', ucwords(str_replace('_', ' ', $key)));
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function getCertificate()
    {
        return $this->certificate;
    }
    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;

        return $this;
    }
    public function getLink()
    {
        return $this->link;
    }
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }
    public function getReviews()
    {
        return $this->reviews;
    }
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;

        return $this;
    }
    public function getScores()
    {
        return $this->scores;
    }
    public function setScores($scores)
    {
        $this->scores = $scores;

        return $this;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
