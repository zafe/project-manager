<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HTML
 *
 * @author gdc
 */
class HTML {    
    public static function options($arrayOpciones,$campoClave,$campoValor,$valor=NULL){
        foreach ($arrayOpciones as $opcion) {
            if($valor!=NULL && $valor == $opcion[$campoClave]){
                $selected="selected='selected'";
            }else{
                $selected="";
            }//if($valor!=NULL && $valor == $opcion[$campoClave])
            echo "<option value='$opcion[$campoClave]' $selected >$opcion[$campoValor]</option>";
        }//foreach ($arrayOpciones as $opcion)    
    }//public static function options($arrayOpciones,$campoClave,$campoValor,$valor=NULL)
}

?>
