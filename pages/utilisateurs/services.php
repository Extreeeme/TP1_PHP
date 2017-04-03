<?php 
if (isset($_POST)) {
	$id = $_POST['id'];
}else{
	header ('location:index.php?p=utilisateurs');
	exit();
}
?>
<h1>Liste des utilisateurs par service</h1>
<form class="col-md-2" action="index.php?p=utilisateurs.services" method="POST">
	<select class="form-control" name="id">
	<? foreach(App::getInstance()->getTable('Service')->all() as $service) : ?>
		<option value="<?=$service->id?>" <?=$service->id === $id ? 'selected=selected' : '' ;?>><?=$service->nom_du_service?></option>
	<? endforeach ?>
	</select>
	<input class="btn btn-primary" type="submit" value="Filtrer">
</form>
<table class="col-md-12 table-bordered text-center">
	<thead>
		<tr>
			<td>NOM, PRÉNOM</td>
			<td>ÂGE</td>
			<td>ADRESSE</td>
			<td>TÉLEPHONE</td>
			<td>SERVICE</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach(App::getInstance()->getTable('Utilisateur')->allByService($id) as $utilisateur) : ?>
			<tr>
				<td><?=$utilisateur->identity ?></td>
				<td><?=$utilisateur->age ?></td>
				<td><?=$utilisateur->adresse; ?></td>
				<td><?=$utilisateur->numero_de_telephone; ?></td>
				<td><?=$utilisateur->nom_du_service; ?></td>
				<td>
				<form action="admin.php?p=utilisateur.delete" method="POST">
				<input type="hidden" name=id value=<?=$utilisateur->id?>>
				<input class="btn btn-danger" value="Supprimer" type="submit"></input>
				</form>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>