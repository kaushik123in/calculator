<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Calculator extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model( 'calculator_model', 'cal' );
    }

    public function index()
    {

        if ( $this->input->post() ) {

            $num1= $this->input->post( 'number1' );
            $num2= $this->input->post( 'number2' );
            $operand= $this->input->post( 'operand_id' );


            $this->form_validation->set_rules( 'number1', 'Number 1' , 'required|trim|numeric|callback_zero_check['.$operand.']' );
            $this->form_validation->set_rules( 'number2', 'Number 2' , 'required|trim|numeric|callback_zero_check['.$operand.']' );

            $this->form_validation->set_error_delimiters( '<div class="errormsg">', '</div>' );

            if ( $this->form_validation->run($this) !== FALSE) {
                    $layout['result'] = $this->cal->operation($num1,$num2, $operand);
            }

        }

        $layout['all_operand']= $this->cal->operand();
        $layout['page_title'] = 'My Calculator';
        $this->load->view('calculator',$layout);
    }

    //Division BY 0 not allowed.
    public function zero_check($number,$operand){
        if (($number=='0' && $operand=='divide')){
            $this->form_validation->set_message('zero_check', '%s : Division BY 0 Not Allowed.');
            return FALSE;
        }else{
            return TRUE;
        }
    }
}
