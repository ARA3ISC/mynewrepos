<?php

class Employe
{

    static public function getAll()
    {
        $query = DB::connect()->prepare('SELECT * FROM employes');
        $query->execute();
        return $query->fetchAll();
    }

    public static function getOneEmploye($data){
        $id = $data['id'];
        try{

            $query = 'SELECT * FROM employes WHERE id = :id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            $employe = $stmt->fetch(PDO::FETCH_OBJ);

            return $employe;
        }
        catch(PDOException $ex){
            echo 'error : '. $ex->getMessage();
        }
        
        
        
    }


    static public function add($data)
    {
        
        $query = DB::connect()->prepare('INSERT INTO employes(nom, prenom, matricule, depart, poste, date_emb, statut) 
            VALUES (:nom, :prenom, :matricule, :depart, :poste, :date_emb,:statut)');

        $query->bindparam(':nom', $data['nom']);
        $query->bindparam(':prenom', $data['prenom']);
        $query->bindparam(':matricule', $data['matricule']);
        $query->bindparam(':depart', $data['depart']);
        $query->bindparam(':poste', $data['poste']);
        $query->bindparam(':date_emb', $data['date_emb']);
        $query->bindparam(':statut', $data['statut']);

        if ($query->execute()) {
            return "added";
        } else {
            return "error";
        }
        $query = null;
    }

    static public function update($data)
    {
        
        $query = DB::connect()->prepare('UPDATE employes SET nom = :nom, prenom = :prenom, matricule = :matricule,
        depart = :depart, poste = :poste, date_emb = :date_emb, statut = :statut WHERE id =:id');

        $query->bindparam(':id', $data['id']);
        $query->bindparam(':nom', $data['nom']);
        $query->bindparam(':prenom', $data['prenom']);
        $query->bindparam(':matricule', $data['matricule']);
        $query->bindparam(':depart', $data['depart']);
        $query->bindparam(':poste', $data['poste']);
        $query->bindparam(':date_emb', $data['date_emb']);
        $query->bindparam(':statut', $data['statut']);
        //die(print_r($data));

        if ($query->execute()) {
            return "modified";
        } else {
            return "error";
        }
        $query = null;
    }

    public static function delete($data){
        $id = $data['id'];
        try{
            
            $query = 'DELETE FROM employes WHERE id = :id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            
            if ($stmt->execute()) {
                return "deleted";
            }
            //$query = null;
        }
        catch(PDOException $ex){
            echo 'error : '. $ex->getMessage();
        }
        
    }

    public static function searchEmployes($data){
        $search = $data['search'];
        $query = "SELECT * FROM employes WHERE CONCAT(nom,' ',prenom) LIKE '%$search%' OR nom LIKE ? OR prenom LIKE ?";
        //var_dump($search);

        //$query = "SELECT * from employes  WHERE CONCAT(nom,' ',prenom)  LIKE '%$search%'";
        


        $stmt = DB::connect()->prepare($query);
        $stmt->execute(array("%" . $search ."%", "%" . $search ."%"));
        
        $employes = $stmt->fetchAll();
        //var_dump($employes);

        return $employes; 
    }


}
