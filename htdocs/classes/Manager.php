<?php
class Manager
{
    private PDO $db;



    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getDb()
    {
        return $this->db;
    }

    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }
    // ADD TOUR_OPERATOR
    public function createTourOperator(TourOperator $tourOperator)
    {
        $preparedRequest = $this->db->prepare('INSERT INTO `tour_operator`(`name`, `link`, `userId`) VALUES (?,?,?)');
        $preparedRequest->execute([
            $tourOperator->getName(),
            $tourOperator->getLink(),
            $tourOperator->getUserId()
        ]);
        $idOperator = $this->db->lastInsertId();
        $tourOperator->setId($idOperator);
    }
    public function createAttenteTourOperator(TourOperator $tourOperator)
    {
        $preparedRequest = $this->db->prepare('INSERT INTO `new_tour_operator`(`name`, `link`, `userId`) VALUES (?,?,?)');
        $preparedRequest->execute([
            $tourOperator->getName(),
            $tourOperator->getLink(),
            $tourOperator->getUserId()
        ]);
        $idOperator = $this->db->lastInsertId();
        $tourOperator->setId($idOperator);
        return $tourOperator;
    }
    public function createDestination(Destination $destination)
    {
        $preparedRequest = $this->db->prepare('INSERT INTO `destination`(`location`, `price`, `tour_operator_id`) VALUES (?,?,?)');
        $preparedRequest->execute([
            $destination->getLocation(),
            $destination->getPrice(),
            $destination->getTourOperatorId()
        ]);
        $idDestination = $this->db->lastInsertId();
        $destination->setId($idDestination);
        return $destination;
    }
    public function createAttenteDestination(Destination $destination)
    {
        $preparedRequest = $this->db->prepare('INSERT INTO `new_destination`(`location`, `price`, `tour_operator_id`) VALUES (?,?,?)');
        $preparedRequest->execute([
            $destination->getLocation(),
            $destination->getPrice(),
            $destination->getTourOperatorId()
        ]);
        $idDestination = $this->db->lastInsertId();
        $destination->setId($idDestination);
        return $destination;
    }

}
