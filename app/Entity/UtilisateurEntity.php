<?php 
namespace App\Entity;

use Core\Entity\Entity;

/**
* L'Entity de la table Utilisateurs
*/
class UtilisateurEntity extends Entity
{
	public function getIdentity()
	{
		return strtoupper($this->nom).' '.ucfirst($this->prenom);
	}

	public function getAge()
	{
		return (int) ((time() - strtotime($this->date_de_naissance))/(60*60*24*365));
	}
}