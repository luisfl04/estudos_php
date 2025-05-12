<?php 
// Classe que representa a tabela 'PET'.
class Pet{
    // Atributos:
    private $nome_do_pet;
    private $apelido;
    private $tipo_do_pet;
    private $dono_do_pet;

    // Construct:
    public function __construct($nome_passado, $apelido_passado, $tipo_do_pet_informado, $dono_do_pet_informado){
        $this->nome_do_pet = $nome_passado;
        $this->apelido = $apelido_passado;
        $this->tipo_do_pet = $tipo_do_pet_informado;
        $this->dono_do_pet = $dono_do_pet_informado;
    }

    // Getters:
    public function getNomePet(){
        return $this->nome_do_pet;
    }

    public function getApelido(){
        return $this->apelido;
    }

    public function getTipoPet(){
        return $this->tipo_do_pet;
    }
    public function getDonoPet(){
        return $this->dono_do_pet;
    }



}



?>