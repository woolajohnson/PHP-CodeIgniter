<?php 
    class Countdown extends CI_Controller {
        public function main() {
            $timezone = new DateTimeZone('Asia/Manila');
            $currentTime = new DateTime('now', $timezone);
            $endOfDay = new DateTime('tomorrow', $timezone);
            $timeRemaining = $currentTime->diff($endOfDay);
            
            $hours = ($timeRemaining->h) * 3600;
            $minutes = ($timeRemaining->i) * 60;
            $seconds = $timeRemaining->s;

            $remainingSeconds = $hours + $minutes + $seconds;
            $date = date('F d, Y');
            $data['countdown'] = array(
                "seconds" => $remainingSeconds,
                "date" => $date
            );
        
            $this->load->view('countdown_view', $data);
        }
    }
?>