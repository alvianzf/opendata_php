<?php
/**
 * Database utility functions
 */

/**
 * Fetch all rows from a table
 * @param string $tableName The name of the table
 * @return resource MySQL result resource
 */
function fetchAll($tableName) {
    return mysql_query("SELECT * FROM " . mysql_real_escape_string($tableName));
}

/**
 * Delete a row from a table by ID
 * @param string $tableName The name of the table
 * @param int $id The ID of the row to delete
 */
function deleteById($tableName, $id) {
    $tableName = mysql_real_escape_string($tableName);
    $id = intval($id);
    mysql_query("DELETE FROM $tableName WHERE id = $id");
}

/**
 * Delete rows from a table based on a criteria
 * @param string $tableName The name of the table
 * @param string $criteria The column name for the criteria
 * @param mixed $value The value to match in the criteria column
 */
function deleteWhere($tableName, $criteria, $value) {
    $tableName = mysql_real_escape_string($tableName);
    $criteria = mysql_real_escape_string($criteria);
    $value = mysql_real_escape_string($value);
    mysql_query("DELETE FROM $tableName WHERE $criteria = '$value'");
}

/**
 * Search for rows in a table
 * @param string $tableName The name of the table
 * @param string $criteria The column name to search in
 * @param string $value The value to search for
 * @return resource MySQL result resource
 */
function searchLike($tableName, $criteria, $value) {
    $tableName = mysql_real_escape_string($tableName);
    $criteria = mysql_real_escape_string($criteria);
    $value = mysql_real_escape_string($value);
    return mysql_query("SELECT * FROM $tableName WHERE $criteria LIKE '%$value%'");
}

/**
 * Fetch rows from a table based on a criteria
 * @param string $tableName The name of the table
 * @param string $criteria The column name for the criteria
 * @param mixed $value The value to match in the criteria column
 * @return resource MySQL result resource
 */
function fetchWhere($tableName, $criteria, $value) {
    $tableName = mysql_real_escape_string($tableName);
    $criteria = mysql_real_escape_string($criteria);
    $value = mysql_real_escape_string($value);
    return mysql_query("SELECT * FROM $tableName WHERE $criteria = '$value'");
}

/**
 * Fetch a single field from a row based on a criteria
 * @param string $tableName The name of the table
 * @param string $criteria The column name for the criteria
 * @param mixed $value The value to match in the criteria column
 * @param string $field The name of the field to return
 * @return mixed The value of the specified field
 */
function fetchField($tableName, $criteria, $value, $field) {
    $tableName = mysql_real_escape_string($tableName);
    $criteria = mysql_real_escape_string($criteria);
    $value = mysql_real_escape_string($value);
    $field = mysql_real_escape_string($field);
    $result = mysql_query("SELECT $field FROM $tableName WHERE $criteria = '$value' LIMIT 1");
    $row = mysql_fetch_assoc($result);
    return $row[$field] ?? null;
}

/**
 * Insert a new row into a table
 * @param string $tableName The name of the table
 * @param string $values Comma-separated list of values to insert
 */
function insertRow($tableName, $values) {
    $tableName = mysql_real_escape_string($tableName);
    mysql_query("INSERT INTO $tableName VALUES ($values)");
}

/**
 * Authenticate a user
 * @param string $username The username
 * @param string $password The password
 * @return bool True if authentication successful, false otherwise
 */
function authenticateUser($username, $password) {
    $username = mysql_real_escape_string($username);
    $result = mysql_query("SELECT password FROM tb_user WHERE id_peg = '$username'");
    $row = mysql_fetch_assoc($result);
    return ($row && $row['password'] === $password);
}

/**
 * Count rows in a table based on a criteria
 * @param string $tableName The name of the table
 * @param string $criteria The column name for the criteria
 * @param mixed $value The value to match in the criteria column
 * @return int The number of matching rows
 */
function countWhere($tableName, $criteria, $value) {
    $tableName = mysql_real_escape_string($tableName);
    $criteria = mysql_real_escape_string($criteria);
    $value = mysql_real_escape_string($value);
    $result = mysql_query("SELECT COUNT(*) as count FROM $tableName WHERE $criteria = '$value'");
    $row = mysql_fetch_assoc($result);
    return intval($row['count']);
}

/**
 * Count all rows in a table
 * @param string $tableName The name of the table
 * @return int The total number of rows
 */
function countAll($tableName) {
    $tableName = mysql_real_escape_string($tableName);
    $result = mysql_query("SELECT COUNT(*) AS total FROM $tableName");
    $row = mysql_fetch_assoc($result);
    return intval($row['total']);
}

/**
 * Search for forms by name
 * @param string $value The search term
 * @return string|null The name of the matching form, or null if not found
 */
function searchForm($value) {
    $value = mysql_real_escape_string($value);
    $result = mysql_query("SELECT nama_form FROM tb_form WHERE nama_form LIKE '%$value%' LIMIT 1");
    $row = mysql_fetch_assoc($result);
    return $row['nama_form'] ?? null;
}
?>
