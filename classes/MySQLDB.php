<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MySQLDB
 *
 * @author gcorrea
 */
class MySQLDB {
    protected $host;
    protected $usuario;
    protected $pass;
    protected $base;
    protected $link;

    public function __construct($host=null,$usuario=null,$pass=null,$base=null) {
        $this->host = ($host != null) ? $host : DB_HOST;
        $this->usuario = ($usuario != null) ? $usuario : DB_USR;
        $this->pass = ($pass != null) ? $pass : DB_PASS;
        $this->base = ($base != null) ? $base : DB_BASE;
        $this->link = mysql_connect($this->host,  $this->usuario, $this->pass)
                      or die("Fallo la coneccion al servidor de BBDD");
        mysql_select_db($this->base,$this->link) or die("Fallo al seleccionar la BBDD");
    }
    
    public function __destruct() {
        if($this->link != null)
            mysql_close($this->link);
    }
    
    public function query($SQL){
        $result=mysql_query($SQL,  $this->link)
                or die("Fallo la Consulta:<br/>".mysql_error($this->link).
                        "<br/><pre>$SQL</pre>");
        
        $filas=array();
        while ($row = mysql_fetch_array($result)) {
            $filas[]=$row;
        }
        mysql_free_result($result);
        return $filas;
    }
    
    public function update($SQL){
        $result=mysql_query($SQL,  $this->link)
                or die("Fallo la Consulta:<br/>".mysql_error($this->link).
                        "<br/><pre>$SQL</pre>");
        error_log($SQL);
        if($result){
            return mysql_affected_rows();
        }else{
            return NULL;
        }
    }
}

?>
