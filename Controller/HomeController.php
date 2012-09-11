<?php

    class HomeController extends AppController {
        
		
		var $name = 'Home';
		
        public $components = array('Session', 'Cookie', 'RequestHandler'); 
        var $helpers = array('Html', 'Form', 'Js'); 

        function index($progress = null) {
            $this -> layout = 'default';

            $this -> set ('title_for_layout', 'Johnny 5, is ALIVE.');

            $like = false;

            if ($progress == 1) {
                $buttonColour = 'grey';
                $buttonCopy = 'Thank you for your input';
            } else {
                $buttonColour = 'blue';
                $buttonCopy = 'Need input';
            }

            if (isset($_COOKIE['c4lReg']))
            {
                $user = $_COOKIE['c4lReg'];
                $user = explode(',', $user);
                $this -> Set ('oldName', $user[0]);
                $this -> Set ('oldEmail', $user[1]);
                $this -> Set ('btnStatus', "disabled='disabled'");
            }

            $this -> Set (array(
                'buttonColour' => $buttonColour,
                'buttonCopy' => $buttonCopy,
                'like' => $like,
                'header1' => 'Do you want to be a pepper too?',
                'copyDeck' => 'Number 5 of a group of experimental robots in a lab is electrocuted, suddenly becomes intelligent, and escapes.'
            ));

        }

        function saveData() {
            $this -> autoRender = false;
            $this -> layout = false;

            $this -> Home -> set(array(
                'name' => $userName,
                'email' => $userEmail
            ));

            $this -> Home -> Save();

            setcookie('c4lReg', $userName . ',' . $userEmail, time()+Configure::read('cookie.time'), Configure::read('cookie.path'), Configure::read('cookie.domain'));

            $this->redirect(array('controller' => 'home', 'action' => 'index', 1));
        }

        function tab() {
            $this -> layout = 'default';
        } 

    }