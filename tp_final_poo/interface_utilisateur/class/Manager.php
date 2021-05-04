<?php

class Manager {

    private $bdd;
    

    
    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }



    public function getAllDestination(){

    $list = [];
    $select = $this->bdd->prepare('SELECT * FROM destinations');
    $select->execute();
   
    foreach($select->fetchAll() as $loc){ 

        array_push($list, new Destination($loc));

    }
            return $list;
}


    public function getOperatorByDestination(){
        
    }

    public function CreatReview(){
        
    }

    public function getAllOperator(){
        
    }

    public function updateOperatorToPremium(){
        
    }

    public function CreatDestination(Destination $lieu){
        $q = $this->bdd->prepare(
            'INSERT INTO destinations (location, price,id_tour_operator)
            VALUES(:location, :price, :id_tour_operator)'
        );
        $q->bindValue(':location', $lieu->getLocation());
        $q->bindValue(':price', $lieu->getPrice(), PDO::PARAM_INT);
        $q->bindValue(':id_tour_operator', $lieu->getId_tour_operator());
        $q->execute();
    }
}


