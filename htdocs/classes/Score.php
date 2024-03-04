<?php
class Score
{
    private int $id;
    private string $value;
    private $author;

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
    public function getAuthor()
    {
        return $this->author;
    }
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }
    public function getValue()
    {
        return $this->value;
    }
    public function setValue($value)
    {
        $this->value = $value;

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
