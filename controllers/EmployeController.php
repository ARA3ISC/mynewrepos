<?php

class EmployeController{
    
    public function getAllEmployes(){
        $employes = Employe::getAll();
        return $employes;
    }

    public function getEmployeDetails(){
        if (isset($_POST['id'])){

            $data = array(
                'id' => $_POST['id']
            );

            $emp = Employe::getOneEmploye($data);
            return $emp;
        }

        
    }


    public function addEmploye(){
        if (isset($_POST['submit'])){
            
            $date = $_POST['date_emb']. ' ' .date("H:i:s");

            function check_field(){
                if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mat']) && 
                !empty($_POST['dep']) && !empty($_POST['poste']))
                {
                    return true;
                }
                else{
                    return false;
                }
            };
            //var_dump(check_field());
            

            if (check_field()){
                $data = array(
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'matricule' => $_POST['mat'],
                    'depart' => $_POST['dep'],
                    'poste' => $_POST['poste'],
                    'date_emb' => $date,
                    'statut' => $_POST['statut'],
                );
    
                $result = Employe::add($data);
    
                if ($result === 'added'){
                    Session::set('success', 'Ajouté avec succes');
                    Redirect::to('home');
                }
                // else{
                //     // return $result;
                // }
            } 

            
        }
    }



    public function updateEmploye(){
        if (isset($_POST['submit'])){

            //die($_POST['id']);
            $date = $_POST['date_emb']. ' ' .date("H:i:s");

            function check_field(){
                if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mat']) && 
                !empty($_POST['dep']) && !empty($_POST['poste']))
                {
                    return true;
                }
                else{
                    return false;
                }
            };
            //var_dump(check_field());
            

            if (check_field()){
                $data = array(
                    'id' => $_POST['id'],
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'matricule' => $_POST['mat'],
                    'depart' => $_POST['dep'],
                    'poste' => $_POST['poste'],
                    'date_emb' => $date,
                    'statut' => $_POST['statut'],
                );
    
                $result = Employe::update($data);
    
                if ($result === 'modified'){
                    // header('location:' . BASE_URL);
                    echo '
                        <div id="success-alert" class="alert alert-success" role="alert">
                            Modifié avec succes
                        </div>
                    ';
                }
                else{
                    echo '
                        <div class="alert alert-danger" role="alert">
                            Error
                        </div>
                    ';
                }
            } 

            
        }
    }


    public function deleteEmploye(){
        if (isset($_POST['id'])){
                $data['id'] = $_POST['id'];
                $result = Employe::delete($data);
                
                if ($result === 'deleted'){
                    Session::set('success', 'Supprimé avec succes');
                    Redirect::to('home');
                    // $_SESSION['deleted'] = 'true';
                }
                else{
                    echo '
                        <div class="alert alert-danger" role="alert">
                            Error
                        </div>
                    ';
                }
            } 

            
        }

        public function findEmployes(){
            if(isset($_POST['search'])){
                $data = array('search' => $_POST['search']);
            }
            $employes = Employe::searchEmployes($data);
            if (empty($employes)){
                Session::set('error', 'Introuvable');
                Redirect::to('home');
            }
            else{
                return $employes;
            }
            
        } 
    
    
}