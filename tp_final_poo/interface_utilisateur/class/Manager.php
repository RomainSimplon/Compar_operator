<?php

class Manager {

    private $bdd;
    

    
    public function __construct($bdd){
    
        $this->setBdd($bdd);

    }

    public function setBdd(PDO $bdd){

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

public function getOperatorByDestination($location){
        
    $allOperators = [];

    $operatorByDestination = $this->bdd->prepare( 

        'SELECT *
        FROM tour_operators
        JOIN destinations
            ON tour_operators.id = destinations.id_tour_operator
        WHERE destinations.location = ?'
    );

    $operatorByDestination->execute([$location]);
    $data = $operatorByDestination->fetchAll(PDO::FETCH_ASSOC);

    foreach($data as $opByDest){

        $arrayPeers = [

           'operator' => new TourOperator([
                'id'=> $opByDest['id_tour_operator'],
                'name' => $opByDest['name'],
                'grade' => $opByDest['grade'],
                'link' => $opByDest['link'],
                'isPremium' => intval( $opByDest['is_premium'])
            ]),
           'destination' => new Destination([
                'id'=> $opByDest['id'],
                'price'=> $opByDest['price'],
                'location'=> $opByDest['location'],
                'id_tour_operator'=> $opByDest['id_tour_operator'],

            ])

        ];

        array_push($allOperators,$arrayPeers);

    }

    return $allOperators;

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


