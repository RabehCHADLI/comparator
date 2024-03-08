<?php


class Review
{
    private int $id;
    private string $message;
    private int $authorId;
    private int $tourOperatorId;
    


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

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    public function getAuthorId()
    {
        return $this->authorId;
    }
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;

        return $this;
    }
    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }
    public function getTourOperatorId()
    {
        return $this->tourOperatorId;
    }
    public function setTourOperatorId($tourOperatorId)
    {
        $this->tourOperatorId = $tourOperatorId;

        return $this;
    }
}
