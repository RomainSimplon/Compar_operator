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


public function getLastDestination(){

    $list = [];
    $select = $this->bdd->prepare('SELECT * FROM destinations ORDER BY id DESC limit 3');
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


public function CreatOperator(TourOperator $operators){
    var_dump($operators);
    $q = $this->bdd->prepare(
        'INSERT INTO tour_operators (name, grade,link,is_premium)
        VALUES(:name, :grade, :link, :is_premium)'
    );
    $q->bindValue(':name', $operators->getName());
    $q->bindValue(':grade', $operators->getGrade(), PDO::PARAM_INT);
    $q->bindValue(':link', $operators->getLink());
    $q->bindValue(':is_premium', $operators->getIsPremium());
    $q->execute();
}


public function offreOperator($id){


    $liste_offre = [];
    $select = $this->bdd->prepare('SELECT * FROM destinations WHERE id_tour_operator = ? ');
    $select->execute([$id]);;
    $data = $select->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $loc){ 

        array_push($liste_offre, new Destination($loc));

    }
            return $liste_offre;
}

public function CreatReview(Review $messages){
    $q = $this->bdd->prepare(
        'INSERT INTO reviews (message, author,id_tour_operator)
        VALUES(:message, :author, :id_tour_operator)'
    );
    $q->bindValue(':message', $messages->getMessage());
    $q->bindValue(':author', $messages->getAuthor());
    $q->bindValue(':id_tour_operator', $messages-> getTourOperator());
    $q->execute();
}



    public function getAllOperator(){
        $list = [];
        $select = $this->bdd->prepare('SELECT * FROM tour_operators');
        $select->execute();
       
        foreach($select->fetchAll() as $operators){ 
    
            array_push($list, new TourOperator($operators));
    
        }
                return $list;

    }

    public function getAllMessages(){
        $messages = [];
    $select = $this->bdd->prepare('SELECT * FROM reviews');
    $select->execute();
   
    foreach($select->fetchAll() as $msg){ 

        array_push($messages, new Review($msg));

    }
            return $messages;
    }




    public function updateOperatorToPremium(){
        
    }

    public function CreatDestination(Destination $lieu){
        $q = $this->bdd->prepare(
            'INSERT INTO destinations (location, price,id_tour_operator,image,imagenoiretblanc)
            VALUES(:location, :price, :id_tour_operator, :image, :imagenoiretblanc)'
        );
        $q->bindValue(':location', $lieu->getLocation());
        $q->bindValue(':price', $lieu->getPrice(), PDO::PARAM_INT);
        $q->bindValue(':id_tour_operator', $lieu->getId_tour_operator());
        $q->bindValue(':image', $lieu->getImage());
        $q->bindValue(':imagenoiretblanc', $lieu->getImagenoiretblanc());
        $q->execute();
    }

    public function deleteDestination(Destination $destination){

        $this->bdd->exec('DELETE FROM destinations WHERE id = '.$destination->getId());

    }



    public function deleteTourOperator(TourOperator $operator){

        $this->bdd->exec('DELETE FROM tour_operators WHERE id = '.$operator->getId());

    }

    
    public function login(Admin $log){
        if(isset($_POST['btn'])){
            $user = addslashes(strip_tags($_POST['$user']));
            $pw = addslashes(strip_tags($_POST['pw']));

            if (!empty($user) AND !empty($pw)) {
                $sql = $this->bdd->prepare("SELECT * FROM 'users' WHERE username = :user AND password = :pw");
                $sql->execute(array('users' => $user,'pw' => $pw));

                if($sql->rowCount()){
                    $data = $sql->fetch();
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['id'] = true;
                    header('location:admin_login.php');
                }else{
                    echo 'username or password are wrong';
                }
            }else{
                echo "please enter username and password";
            }
        }
    }











}


