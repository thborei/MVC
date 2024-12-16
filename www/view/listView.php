<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>PV</th>
        <th>PVMax</th>
        <th>Force</th>
        <th>Dé</th>
        <th>Chance</th>
        <th>XP</th>
        <th>Argent</th>
        <th>Avatar</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($characters as $char): ?>
        <tr>
            <td><?= $char->getId() ?></td>
            <td><?= htmlspecialchars($char->getNom()) ?></td>
            <td><?= $char->getPV() ?></td>
            <td><?= $char->getPVMax() ?></td>
            <td><?= $char->getforce() ?></td>
            <td><?= $char->getfacesDe() ?></td>
            <td><?= $char->getchance() ?></td>
            <td><?= $char->getXp() ?></td>
            <td><?= $char->getmoney() ?></td>
            <td><?= $char->getavatar() ?></td>
            <td>
                <a href="personnage/<?= $char->getId() ?>">Modifier</a>
                <a href="personnage/<?= $char->getId() ?>/delete" onclick="return confirm('Confirmer la suppression ?')">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="personnage/ajouter">Ajouter un personnage</a>