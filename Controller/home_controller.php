<?php

    class HomeController extends AppController {
        var $name = 'Home';
        public $components = array('Session', 'Cookie', 'RequestHandler', 'Facebook');
        var $helpers = array('Html', 'Form', 'Js', 'Session');

        function index($progress = null) {
            $this -> layout = 'default';

            $this -> set ('title_for_layout', 'Johnny 5, is ALIVE.');

            // whether 'Like' CTA is displayed
            $like = $this->Facebook->getLike();
                        
            $errors = array();
            if ($progress == 1) {
                $buttonColour = 'grey';
                $buttonCopy = 'Thank you for your input';
                
                // requirement for disabling the form only exists at this URL
	            if (isset($_COOKIE['c4lReg'])) {
	                $user = $_COOKIE['c4lReg'];
	                $user = explode(',', $user);
	                $this -> Set ('oldName', $user[0]);
	                $this -> Set ('oldEmail', $user[1]);
	                
	                $this -> Set ('btnStatus', "disabled='disabled'");
	            }                
            } else {
                $buttonColour = 'blue';
                $buttonCopy = 'Need input';
                
                // check if POST
				if($this->request->is('post')) {
	            	$this->_saveData();	// validate/save
	            	
	            	$this -> Set ('oldName', $this->request->data('name'));
	                $this -> Set ('oldEmail', $this->request->data('email'));
	                
	                $validation = $this->Home->invalidFields();
	                if(!empty($validation)) {
	                	foreach($validation as $k => $v) {
	                		array_push($errors, $v[0]);
	                	}
	                }
	            }                
            }

            $this -> Set (array(
                'buttonColour' => $buttonColour,
                'buttonCopy' => $buttonCopy,
            	'errors' => $errors,
                'like' => $like,
                'header1' => 'Do you want to be a pepper too?',
                'copyDeck' => 'Number 5 of a group of experimental robots in a lab is electrocuted, suddenly becomes intelligent, and escapes.'
            ));

        }

        protected function _saveData() {
           // $this -> autoRender = false;
           // $this -> layout = false;

            $userName = $this->request->data['name'];
            $userEmail = $this->request->data['email'];
            
			$this->Home->create();
			if($this->Home->save($this->request->data)) {
				// set cookie for data population post-redirect
            	setcookie('c4lReg', $userName . ',' . $userEmail, time()+Configure::read('cookie.time'), Configure::read('cookie.path'), Configure::read('cookie.domain'));
            	$this->redirect(array('controller' => 'home', 'action' => 'index', 1));					
            } // else send back errors to view

            
        }

        function tab() {
            $this -> layout = 'default';
        }

    }