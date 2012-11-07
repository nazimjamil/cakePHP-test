<?php

class Home extends AppModel {

    var $name = 'Home';
    public $validate = array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'Please provide your name.'
        ),
        'email' => array(
            'rule' => array('email'),
            'message' => 'Your Email address is required.'
        ),
        'tnc' => array(
            'notEmpty' => array(
                'rule' => array('equalTo', '1'),
                'required' => true,
                'message' => 'Please confirm that you have read the trivia.'
            ),
        ),
    );

    // var $useDbConfig = 'name of other db connection';
}