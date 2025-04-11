
<?php

function isUserLoggedIn()
{
    if (!getDataFromSession("user")) {
        redirectURL("security", "connexion");
        exit();
    };
}

function isLogged()
{
    if (getDataFromSession("user")) {
        redirectUserByRole(getDataFromSession("user", "role"));
        exit;
    }
}

function credentialUser(string $email, string $password): array|null
{
    $sql = "
    SELECT u.nom, u.id, u.prenom, u.avatar, u.role
    FROM users u
    WHERE u.email = ? AND u.password = ?";
    $params = [$email, $password];
    $user = fetchResult($sql, $params, false);
    return $user ?: null;
}
