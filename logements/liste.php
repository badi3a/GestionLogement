<?php
include '../includes/db.php';
include '../includes/header.php';

// Récupérer tous les logements
$sql = "SELECT * FROM logements";
$stmt = $pdo->query($sql);
$logements = $stmt->fetchAll();
?>

<h2 class="mb-4">Liste des logements</h2>
<a href="ajouter.php" class="btn btn-primary mb-3">Ajouter un logement</a>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Adresse</th>
        <th scope="col">Prix</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($logements as $logement): ?>
        <tr>
            <td><?= $logement['id'] ?></td>
            <td><?= $logement['adresse'] ?></td>
            <td><?= $logement['prix'] ?></td>
            <td><?= $logement['description'] ?></td>
            <td>
                <a href="modifier.php?id=<?= $logement['id'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                <a href="supprimer.php?id=<?= $logement['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php include '../includes/footer.php'; ?>
