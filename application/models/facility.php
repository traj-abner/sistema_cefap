<?php

class Facility extends Datamapper {
   
	public $table = 'facilities';
        
   
	public $has_one = array(
				
	);
   
    public $has_many = array(
		'lancamento' => array(			
                    'class' => 'lancamento',			
                    'other_field' => 'facility'
              ),
		'usuario' => array(
			'class' => 'usuario',
			'other_field' => 'facility',
			'join_self_as' => 'facility',
			'join_other_as' => 'usuario',
			'join_table' => 'facilities_usuarios'
		),
		'agendamento' => array(
			'class' => 'agendamento',
			'other_field' => 'facility',
		),
		'log' => array(
			'class' => 'log',
			'other_field' => 'facility'
		),
		'formulario' => array(
			'class' => 'formulario',
			'other_field' => 'facility',
			'join_self_as' => 'facility',
			'join_other_as' => 'formulario',
			'join_table' => 'facilities_formulario'
		),
		'periodo' => array(
			'class' => 'periodo',
			'other_field' => 'facility'
		),
		'agendamento' => array(
			'class' => 'agendamento',
			'other_field' => 'facility'
		)
    );
   
}

?>