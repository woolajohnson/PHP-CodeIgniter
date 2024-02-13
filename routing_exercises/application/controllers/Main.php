<?php 
    class Main extends CI_Controller {
        public function index() {
            echo "I am Main Class!";
        }
        public function hello () {
            echo "Hello World!";
        }
        public function say($hi) {
            echo strtoupper("$hi");
        }
        public function say_anything($anything) {
            echo strtoupper("$anything");
        }
        public function danger() {
            redirect('/main');
        }
        public function test() {
            echo "Hurray!";
        }
    }
?>