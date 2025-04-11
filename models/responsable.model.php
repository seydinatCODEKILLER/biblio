<?php

function getCardStaticDashboard()
{
  $sql = "SELECT
  (SELECT COUNT(*) FROM auteurs) AS total_auteurs,
  (SELECT COUNT(*) FROM rayons) AS total_rayons,
  (SELECT COUNT(*) FROM ouvrages) AS total_ouvrages,
  (SELECT COUNT(*) FROM exemplaires) AS total_exemplaires;
";
  return fetchResult($sql, [], false);
}
