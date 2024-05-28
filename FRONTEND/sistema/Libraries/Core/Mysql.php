<?php

class Mysql extends Conexion
{
    private $conexion;
    private $strquery;
    private $arrValues;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    }

    // Insertar un registro
    public function insert(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $insert = $this->conexion->prepare($this->strquery);
        $resInsert = $insert->execute($this->arrValues);
        if ($resInsert) {
            $lastInsert = $this->conexion->lastInsertId();
        } else {
            $lastInsert = 0;
        }
        return $lastInsert;
    }

    // Busca un registro
    public function select(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data ? $data : array();
    }

    // Devuelve todos los registros
    public function select_all(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchAll(PDO::FETCH_ASSOC);
        return $data ? $data : array();
    }

    // Actualiza registros
    public function update(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $update = $this->conexion->prepare($this->strquery);
        $resExecute = $update->execute($this->arrValues);
        return $resExecute;
    }

    // Eliminar un registro
    public function delete(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $del = $result->execute();
        return $del;
    }

    // Busca en todas las tablas y columnas
    public function searchInTable($table, $searchTerm)
    {
        $escapedSearchTerm = $this->conexion->quote('%' . strtolower($searchTerm) . '%');
    
        $columnNames = $this->getColumnNames($table);
        $selectedColumns = implode(',', $columnNames);
    
        $columnConditions = [];
    
        foreach ($columnNames as $columnName) {
            $columnConditions[] = "LOWER($columnName) LIKE $escapedSearchTerm";
        }
    
        $query = "SELECT $selectedColumns FROM $table WHERE " . implode(' OR ', $columnConditions);
    
        $result = $this->conexion->query($query);
    
        if (!$result) {
            die("Error en la consulta: " . $this->conexion->errorInfo()[2]);
        }
    
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    
        return $rows ? $rows : array();
    }
    
    

    public function searchInAllTables($tables, $searchTerm)
    {
        $foundRecords = [];

        foreach ($tables as $table) {
            $records = $this->searchInTable($table, $searchTerm);
            $foundRecords = array_merge($foundRecords, $records);
        }

        return $foundRecords;
    }

    private function getColumnNames($table)
    {
        $result = $this->conexion->query("SHOW COLUMNS FROM $table");

        if (!$result) {
            die("Error en la consulta: " . $this->conexion->errorInfo()[2]);
        }

        $columnNames = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $columnNames[] = $row['Field'];
        }

        return $columnNames;
    }
}
