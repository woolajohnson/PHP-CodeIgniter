<?php 
    class Main extends CI_Controller {
        public function index() {
            if($this->session->userdata('money') == "") {
                $this->session->set_userdata('money', 500);
            }
            $this->load->view('game');
        }
        public function bet() {
            date_default_timezone_set('Asia/Manila');
            $now = date("m-d-Y g:i A");
            $previous_message = $this->session->userdata('prev_message') ?? '';
            $risk_levels = array(
                'low_risk' => rand(-25, 100),
                'moderate_risk' => rand(-100, 1000),
                'high_risk' => rand(-500, 2500),
                'severe_risk' => rand(-3000, 5000)
            );
            if ($this->session->userdata('money') <= 0) {
                $current_message = $this->session->set_userdata('current_message', "You don't have enough balance to play. You can Reset the Game!");
                $new_message = $previous_message . "<br><span class='{$this->session->userdata('color')}'>{$this->session->userdata('current_message')}</span>";

                $this->session->set_userdata('new_message', $new_message);
                $this->session->set_userdata('prev_message', $new_message);
                redirect('/');
            } elseif ($this->session->userdata('money') > 0) {
                foreach ($risk_levels as $key => $result) {
                    if ($this->input->post($key)) {
                        $current_money = $this->session->userdata('money');
                        $current_money += $result;
                        $this->session->set_userdata('money', $current_money);

                        $color_result = ($result > 0) ? 'win_color' : 'lose_color';
                        $this->session->set_userdata('color', $color_result);

                        $current_message = $now . " You pushed " . ucfirst(str_replace('_', ' ', $key)) . ". Value is " . $result . ". Your current money is " . $this->session->userdata('money');
                        $this->session->set_userdata('current_message', $current_message);

                        $new_message = $previous_message . "<br><span class='{$this->session->userdata('color')}'>{$this->session->userdata('current_message')}</span>";

                        $this->session->set_userdata('new_message', $new_message);
                        $this->session->set_userdata('prev_message', $new_message);
                        redirect('/');
                    }
                }
            }
        }
        public function reset() {
            if ($this->input->post('reset')) {
                $this->session->unset_userdata('money');
                $this->session->unset_userdata('new_message');
                $this->session->unset_userdata('prev_message');
                $this->session->unset_userdata('current_message');
                redirect('/');
            }
        }
    }
?>