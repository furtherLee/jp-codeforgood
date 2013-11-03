<?php

class UserController extends Controller {
    
    public function tryPost() {
        $this->ajaxReturn(array('status' => 'error', 'reason' => fRequest::get('email').' didnot register yet'), 400);
    }

    public function showHomePage () {
        $this->render('homepage', array('title' => "Homepage"));
    }
}