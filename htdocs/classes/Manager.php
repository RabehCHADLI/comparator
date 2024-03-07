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
    public function getOperatorByDestination(Destination $destination)
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM `destination`WHERE `location` = ?');
        $preparedRequest->execute([
            $destination->getLocation()
        ]);
        $destination = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        $idDesti = $this->db->lastInsertId();
        $destination->setId($destination);
        $preparedRequest = $this->db->prepare('SELECT * FROM `tour_operator`WHERE id = ?');
        $preparedRequest->execute([
            $destination['tourOperatorId']
        ]);
        $operator = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $operator;

    }
    public function getAllDestination()
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM `destination`');
        $preparedRequest->execute([]);
        $destinations = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        $desti = [];
        foreach ($destinations as $destination) {
            $forEachdesti = new Destination($destination);
            array_push($desti,$forEachdesti);
        }
        return $desti;
    }
    public function getDestinationByLocation($location)
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM `destination` WHERE `location` LIKE ? ORDER BY `price` ASC;');
        $preparedRequest->execute([
            '%' . $location . '%'
        ]);
        $destinations = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $destinations;

    }
    public function getImgByIdDestination($idDestination)
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM `carousel` WHERE id = ?');
        $preparedRequest->execute([
            $idDestination
        ]);
        $img = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $img
    }
}
