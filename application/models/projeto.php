<?php
class Projeto extends Datamapper{
    
    public $model = 'projeto';
	public $table = 'projetos';
    public $created_field = 'created';
    public $updated_field = 'modified';
    
    public $has_one = array(
        'autor' => array(			// in the code, we will refer to this relation by using the object name 'book'
                        'class' => 'usuario',			// This relationship is with the model class 'book'
                        'other_field' => 'projetos_criados')
        );
    
    public $has_many = array(
        'usuario' => array(
			'class' => 'usuario',
			'other_field' => 'projeto',
			'join_self_as' => 'projeto',
			'join_other_as' => 'usuario',
			'join_table' => 'projetos_usuarios'
		),
        
        'agendamentos' => array(			// in the code, we will refer to this relation by using the object name 'book'
                    'class' => 'agendamentos',			// This relationship is with the model class 'book'
                    'other_field' => 'projeto'
              )
            );
    
    function __construct(){
        
        parent:: __construct();
    }
    
}
?>
