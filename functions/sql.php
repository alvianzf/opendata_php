<?php
    function where($tbname)
    {
        $sql = mysql_query("SELECT * FROM $tbname");
        return $sql;
    }

    function delete($tbname, $id)
    {
        $sql = mysql_query("DELETE FROM $tbname WHERE id = $id");
    }

    function deletedata($tbname, $criteria, $id)
    {
        $sql = mysql_query("DELETE FROM $tbname WHERE $criteria = $id");
    }

    function search($tbname, $criteria, $value)
    {
        $sql = mysql_query("SELECT * FROM $tbname WHERE $criteria LIKE %$value%");
        return $sql;
    }

    function viewdata($tbname, $criteria, $value)
    {
        $sql = mysql_query("SELECT * FROM $tbname WHERE $criteria = $value");
        return $sql;
    }

    function viewdata1($tbname, $criteria, $value, $field)
    {
        $qry = "SELECT * FROM $tbname WHERE $criteria = $value";
        $sql = mysql_query($qry);
        $data = mysql_fetch_array($sql);
        return $data[$field];
    }

    function listdata($tbname, $field)
    {
        $sql = mysql_query("SELECT * FROM $tbname");
        $data = mysql_fetch_assoc($sql);
        return $data[$field];
    }

    function insert($tbname, $value)
    {
        $sql = mysql_query("INSERT INTO $tbname VALUES ($value)");
    }

    function login($username, $password)
    {
        $sql = mysql_query ("SELECT * FROM tb_user WHERE id_peg = '$username'");
        $pass= mysql_fetch_assoc($sql);

        if ($pass['password'] == $password)
        {
            return 1;
        }else
        {
            return 0;
        }
    }

    function statistik($tbname, $criteria, $value)
    {
        $sql = mysql_query("SELECT COUNT(*) FROM $tbname WHERE $criteria = $value");
        return $sql;
    }

    function hitung($tbname)
    {
        $sql = mysql_query("SELECT COUNT(*) AS total FROM $tbname");
        $data = mysql_fetch_assoc($sql);
        return $data['total'];
    }

    function searchform($value)
    {
        $sql = mysql_query("SELECT * FROM tb_form WHERE nama_form LIKE '%$value%' ");
        $data = mysql_fetch_assoc($sql);

        return $data['nama_form'];
    }
    ?>
