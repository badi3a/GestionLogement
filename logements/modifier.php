<?php
include '../includes/db.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adresse = $_POST['adresse'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];

    $sql = "UPDATE logements SET adresse = ?, prix = ?, description = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$adresse, $prix, $description, $id]);

    header('Location: liste.php');
}

$sql = "SELECT * FROM logements WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$logement = $stmt->fetch();

include '../includes/header.php';
?>

<h2 class="mb-4">Modifier le logement</h2>

<form method="POST" class="row g-3">
    <div class="col-md-6">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" name="adresse" value="<?= $logement['adresse'] ?>" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="prix" class="form-label">Prix</label>
        <input type="number" name="prix" step="0.01" value="<?= $logement['prix'] ?>" class="form-control" required>
    </div>

    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4" required><?= $logement['description'] ?></textarea>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Modifier</button>
    </div>
</form>

<?php include '../includes/footer.php'; ?>
