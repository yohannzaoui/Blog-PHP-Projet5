<p style="text-align: center">Il y a actuellement <?= $nombreNews ?> article(s). En voici la liste :</p>

<?php
foreach ($listeNews as $news)
{ ?>

<p><strong>Auteur : </strong><?=$news['auteur']?></p>
<p><strong>Titre : </strong><?=$news['titre']?></p>
<p><strong>Date d'ajout : </strong><?=$news['dateAjout']->format('d/m/Y à H\hi')?></p>
<p><strong>Date de mofification : </strong><?=$news['dateModif']->format('d/m/Y à H\hi')?></p>
<p><a href="news-update-<?=$news['id']?>.html"><img src="/images/update.png" alt="Modifier" /></a> <a href="news-delete-<?=$news['id']?>.html"><img src="/images/delete.png" alt="Supprimer" /></a></p>

<?php
}
?>
</table>