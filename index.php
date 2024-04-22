<?php

echo "App 2";

$dbconn = pg_connect("host=host.docker.internal port=5432 user=postgres password=123456");

$query = 'SELECT * FROM users';
$result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());

echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

pg_free_result($result);

pg_close($dbconn);

