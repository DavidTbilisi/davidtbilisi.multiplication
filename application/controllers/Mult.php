<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mult extends CI_Controller {

    public $min;
    public $max;
    public $answers = [];
    public $answers_count = 8;
    public $namravli;
    public $samravli;
    public $mamravli;

    public function __construct()
    {
        parent::__construct();

        $this->load->helper("david");
        $this->min = 3;
        $this->max = 9;
        $this->samravli = random_int($this->min,$this->max);
        $this->mamravli = random_int($this->min,$this->max);
        $this->namravli = $this->samravli*$this->mamravli;
    }

    public function index()
	{


        $this->answers = $this->generate_answers($this->namravli);

        $this->load->view("incs/head", ["page_title"=>"გამრავლების ტაბულა",]);
        $data = [
            'true'=>[
                "n1"=>$this->samravli,
                "n2"=>$this->mamravli,
                "answer"=>$this->namravli,
                ],
            "answers"=>$this->answers
        ];
        $this->load->view("default", ["data"=>$data]);
        $this->load->view("incs/footer");


	}


	function generate_answers () {
        foreach (range(1, $this->answers_count-1) as $item) {


            if ($this->samravli > $this->mamravli) {
                $min = $this->mamravli;
                $max = $this->samravli;
            } else {
                $min = $this->samravli;
                $max = $this->mamravli;
            }

            $samravli = random_int($this->min,$this->max);
            $mamravli = random_int($this->min,$this->max);
            $namravli = $samravli*$mamravli;

            $this->answers[] = ['n1'=>$samravli, "n2"=>$mamravli,"namravli"=>$namravli,];
        }
        $this->answers[] = ['n1'=>$this->samravli, "n2"=>$this->mamravli,"namravli"=>$this->namravli,];
        shuffle ($this->answers);
        return $this->answers;
    }


    public function report ($json = null) {
        $data = $this->db->where("n1 <",11)->from("times_table")->get()->result();
        if ($json == "json") {
            json_resp(["data"=>$data]);
        }
        $this->load->view("incs/head", ["page_title"=>"Report",]);
        $this->load->view("report", ["data"=>$data,]);
        $this->load->view("incs/footer");
    }


    public function set_min () {

    }
    public function set_max() {
    }

    public function save_answer($ref, $answer = false) {
        $data = $this->db->where("ref",$ref)->from("times_table")->get()->row();
        // echo json($data);


        if ($data->total < 1) {
            $data->total = 1;
        } else {
            $data->total++;
        }


        if ($answer) {

            if ($data->right < 1) {
                $data->right = 1;
            } else {
                $data->right++;
            }

            $data = array(
                'total' => $data->total,
                'right' => $data->right,
            );
        } else {
            $data = array(
                'total' => $data->total,
            );
        }


        $this->db->where('ref', $ref);
        $this->db->update('times_table', $data);

        $data = $this->db->where("ref",$ref)->from("times_table")->get()->row();
        json_resp($data);
    }

}
