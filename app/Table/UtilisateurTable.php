<?php 
namespace App\Table;

use Core\Table\Table;

/**
* Table Utilisateurs
*/
class UtilisateurTable extends Table
{
	public function allToService()
	{
		return $this->query("SELECT utilisateurs.nom,
						utilisateurs.id,
						utilisateurs.prenom,
						utilisateurs.adresse,
						utilisateurs.numero_de_telephone,
						utilisateurs.date_de_naissance,
						services.nom_du_service
					FROM utilisateurs
					LEFT JOIN services 
					ON utilisateurs.services_id = services.id");
	}

	public function allByService($id)
	{
		return $this->query("SELECT utilisateurs.nom,
						utilisateurs.id,
						utilisateurs.prenom,
						utilisateurs.adresse,
						utilisateurs.numero_de_telephone,
						utilisateurs.date_de_naissance,
						services.nom_du_service
					FROM utilisateurs
					LEFT JOIN services 
					ON utilisateurs.services_id = services.id
					WHERE services.id = $id");
	}
}