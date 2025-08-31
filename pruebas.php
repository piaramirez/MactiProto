<?php
/**
 * Configuraciones para cnsumir el appu
 * el nomre del rel
 * uss
 * pass
 * host
 * 
 */
$realm = "master";          
$adminUser = "admin";       
$adminPass = "admin";       // Contraseña
$host = "http://localhost:8080"; // URL de Keycloak

/**
 * Investiguen un poco sobre como consumir las apis con curl, sino se los explico en la semana, anótenlo en el notin
 */
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "$host/realms/master/protocol/openid-connect/token");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
    'username' => $adminUser,
    'password' => $adminPass,
    'grant_type' => 'password',
    'client_id' => 'admin-cli'
]));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$data = json_decode($response, true);
if (!isset($data['access_token'])) {
    die("Error obteniendo token: " . $response);
}
$token = $data['access_token'];
/**
 * Aquí nace la mágia, llamamos los us
 */
$url = "$host/admin/realms/$realm/users";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $token",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

$usuarios = json_decode($response, true);
if (!$usuarios) {
    die("Error al obtener usuarios: $response");
}

echo "<h2>Usuarios del Realm '$realm'</h2>";

/**
 * aquí creamos la tabla para que se vea
 */
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>Username</th><th>Nombre</th><th>Email</th></tr>";

foreach ($usuarios as $u) {
    $firstName = isset($u['firstName']) ? $u['firstName'] : '';
    $lastName  = isset($u['lastName']) ? $u['lastName'] : '';
    $email     = isset($u['email']) ? $u['email'] : '';

    echo "<tr>";
    echo "<td>{$u['id']}</td>";
    echo "<td>{$u['username']}</td>";
    echo "<td>$firstName $lastName</td>";
    echo "<td>$email</td>";
    echo "</tr>";
}
echo "</table>";

?>
