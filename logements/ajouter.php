<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adresse = $_POST['adresse'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];

    $sql = "INSERT INTO logements (adresse, prix, description) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$adresse, $prix, $description]);

    header('Location: liste.php');
}

include '../includes/header.php';
?>

<h2 class="mb-4">Ajouter un logement</h2>

<form method="POST" class="row g-3">
    <div class="col-md-6">
        <label for="adresse" class="form-label">Adresse</label>
        <input type="text" name="adresse" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label for="prix" class="form-label">Prix</label>
        <input type="number" name="prix" step="0.01" class="form-control" required>
    </div>

    <div class="col-12">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4" required></textarea>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </div>
</form>

<?php include '../includes/footer.php'; ?>
