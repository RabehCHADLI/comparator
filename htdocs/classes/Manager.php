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
        $preparedRequest = $this->db->prepare('INSERT INTO `tour_operator`(`name`, `link`, `userId, description`) VALUES (?,?,?, ?)');
        $preparedRequest->execute([
            $tourOperator->getName(),
            $tourOperator->getLink(),
            $tourOperator->getUserId(),
            $tourOperator->getDescription()
        ]);
        $idOperator = $this->db->lastInsertId();
        $tourOperator->setId($idOperator);
    }
    public function createAttenteTourOperator(TourOperator $tourOperator)
    {
        $preparedRequest = $this->db->prepare('INSERT INTO `new_tour_operator`(`name`, `link`, `userId`, `description`) VALUES (?,?,?,?)');
        $preparedRequest->execute([
            $tourOperator->getName(),
            $tourOperator->getLink(),
            $tourOperator->getUserId(),
            $tourOperator->getDescription()
        ]);
    }
    public function createDestination(Destination $destination)
    {
        $preparedRequest = $this->db->prepare('INSERT INTO `destination`(`location`, `price`, `tour_operator_id`, `description`) VALUES (?,?,?,?)');
        $preparedRequest->execute([
            $destination->getLocation(),
            $destination->getPrice(),
            $destination->getTourOperatorId(),
            $destination->getDescription(),

        ]);
        $idDestination = $this->db->lastInsertId();
        $destination->setId($idDestination);
        return $destination;
    }
    public function createAttenteDestination(Destination $destination,$userId)
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM `new_tour_operator` where userId = ?');
        $preparedRequest->execute([
            $userId
        ]);
        $tour = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        var_dump($tour);
        $preparedRequest = $this->db->prepare('INSERT INTO `new_destination`(`location`, `price`, `tour_operator_id`, `description`) VALUES (?,?,?,?)');
        $preparedRequest->execute([
            $destination->getLocation(),
            $destination->getPrice(),
            $tour['id'],
            $destination->getDescription()
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
        $preparedRequest = $this->db->prepare('SELECT * FROM `tour_operator`WHERE id = ?');
        $preparedRequest->execute([
            $destination['tourOperatorId']
        ]);
        $operator = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $operator;

    }
    public function getOperatorByUserId($id)
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM `tour_operator`WHERE userId = ?');
        $preparedRequest->execute([
            $id
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
        $preparedRequest = $this->db->prepare('SELECT * FROM `destination` WHERE `location` LIKE ? ORDER BY `price`');
        $preparedRequest->execute([
            '%' . $location . '%'
        ]);
        $destinations = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        return $destinations;

    }
    public function getImgByIdDestination($idDestination)
    {
        $preparedRequest = $this->db->prepare('SELECT * FROM `carousel` WHERE desination_id = ? ORDER BY RAND()');
        $preparedRequest->execute([
            $idDestination
        ]);
        $img = $preparedRequest->fetch(PDO::FETCH_ASSOC);
        return $img;
    }
    public function addUserDb (User $user)
    {   
        if(!$user->getEntreprise()){
            $preparedRequest = $this->db->prepare('INSERT INTO `user`(`pseudo`, `password`, `entreprise`) VALUES (?,?,?)');
            $preparedRequest->execute([
                $user->getPseudo(),
                $user->getPassword(),
                0
    
            ]);
        }else{
            $preparedRequest = $this->db->prepare('INSERT INTO `user`(`pseudo`, `password`, `entreprise`) VALUES (?,?,?)');
            $preparedRequest->execute([
                $user->getPseudo(),
                $user->getPassword(),
                $user->getEntreprise()
    
            ]);

        }
        $id = $this->db->lastInsertId();
        $user->setId($id);
        return $user;
    }
    public function getUserByPseudo(User $user)
    {
    $preparedRequest = $this->db->prepare('SELECT * FROM `user` WHERE pseudo = ?');
    $preparedRequest->execute([
        $user->getPseudo()
    ]);
    $user = $preparedRequest->fetch(PDO::FETCH_ASSOC);
    return $user;
    }
    public function userConnexion(User $user)
    {
        $manager = new Manager($this->db);
        $userVerify = $manager->getUserByPseudo($user);
        if ($userVerify) {
            $passwordVerify = password_verify($user->getPassword(),$userVerify['password']);
            if ($passwordVerify) {
                $_SESSION['userId'] = $userVerify['id'];
                $_SESSION['pseudo'] = $userVerify['pseudo'];
                if ($userVerify['entreprise']) {
                    $_SESSION['entreprise'] = true;
                    $user = new User($userVerify);
                    return $user;
                }
                $user = new User($userVerify);
                return $user;
            }else {
                return 'Mot de passe incorrect';
            }

        }else{
            return 'compte inexistant';
        }
    }public function get4destination(){
        $preparedRequest = $this->db->prepare('SELECT * FROM `destination` WHERE 4 ORDER by RAND()');
        $preparedRequest->execute([]);
        $destinations = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
        $desti = [];
        foreach ($destinations as $destination) {
            $forEachdesti = new Destination($destination);
            array_push($desti,$forEachdesti);
        }
        return $desti;

    }
    public function addImgDb($nameImg,$destiId)
    {
        $preparedRequest = $this->db->prepare('INSERT INTO `carousel`(`desination_id`, `img`) VALUES (?,?)');
        $preparedRequest->execute([
            $destiId,
            $nameImg
        ]);
    }
}
