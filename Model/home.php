<?php

    class Home extends AppModel {
        var $name = 'Home';
        // var $useDbConfig = 'name of other db connection';
		public $validate = array(
			'name' => array(
				'rule'		=> 'alphaDash',
				'message' 	=> 'Please enter a real name',
				'required'	=> TRUE,
				'allowEmpty' => FALSE,
				'on'		=> 'create',
				'last'		=> TRUE
			),
			'email' => array(
				'rule'		=> 'email',
				'message' 	=> 'A valid email address is required',
				'required'	=> TRUE,
				'allowEmpty' => FALSE,
				'on'		=> 'create'
			),
			'tnc'	=> array(
				'rule'		=> 'numeric',
				'message'	=> 'Please read the trivia below',
				'required'	=> TRUE,
				'allowEmpty' => FALSE,
				'on'		=> 'create'
			)
		);
		public $useTable = 'registrations';
		public $displayField = 'name';
		public $_schema = array(
			'name'	=> array(
				'type'		=> 'string',
				'length'	=> 100
			),
			'email'	=> array(
				'type'		=> 'string',
				'length'	=> 100
			),
			'tnc'	=> array(
				'type'		=> 'tinyint',
				'length'	=> 1
			),
			'updated' => array(
				'type'		=> 'timestamp'
			),
			'created' => array(
				'type'		=> 'datetime'
			)
		);
		
        public function alphaDash($check) {
	        // $data array is passed using the form field name as the key
	        // have to extract the value to make the function generic
	        $value = array_values($check);
	        $value = $value[0];
	
	        return preg_match('|^[a-zA-Z- ]*$|', $value);
        }
        
    }