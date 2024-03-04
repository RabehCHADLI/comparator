<?php
class Certificate
{
    private string $expiresAt;
    private string $signatory;



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
    public function getSignatory()
    {
        return $this->signatory;
    }
    public function setSignatory($signatory)
    {
        $this->signatory = $signatory;

        return $this;
    }
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }
}
