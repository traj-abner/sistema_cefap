<?php

class Facility extends Datamapper {
   
	public $table = 'facilities';
        
   
	public $has_one = array();
   
    public $has_many = array(
        'usuario'      => array(
                'class'         => 'usuario',
                'other_field'   => 'fclts'
         ),
       
        'coordenadores'      => array(
                'class'         => 'usuario',           
                'other_field'   => 'fclts_coordenadas',
                'join_self_as'	=> 'facility_id',
                'join_other_as'	=> 'usuario_id',
                'join_table'	=> 'coordenadores_facilities'
         ),
       
        'logs'      => array(
                'class'         => 'log',        
                'other_field'   => 'facility'
         ),

        'agendamentos'      => array(
                'class'         => 'agendamento',     
                'other_field'   => 'facility'
         ),
       
        'formularios'      => array(
                'class'         => 'formulario',   
                'other_field'   => 'facilities'
         ),
       
        'periodos'      => array(
                'class'         => 'perdiodo',
                'other_field'   => 'facility'
         )
    );
   
}

?>