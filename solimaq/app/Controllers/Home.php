<?php

namespace App\Controllers;

class Home extends BaseController
{
	
	public function index()
	{
		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/inicio');
		}else{
			$data['title'] = "SOLIMAQ";
			echo view('Login/Signin_view' ,  $data);
		}
	}

	public function solimed(){
		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/inicio');
		}else{
			$data_fotter['scripts'] = ["Login_general.js"];
			$data_fotter['external_scripts'] = ["//cdn.jsdelivr.net/npm/sweetalert2@11"];
			$data['title'] = "SOLIMED";
			echo view('Login/Menu_solimed');
			echo view('Login/Solimed' ,  $data);
			echo view('fotter_panel', $data_fotter);
			
		}
	}

	public function soliwaste(){
		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/inicio');
		}else{
			$data_fotter['scripts'] = ["Login_general.js"];
			$data['title'] = "SOLIWASTE";
			echo view('Login/Soliwaste' ,  $data);
			echo view('fotter_panel', $data_fotter);
		}
	}

	public function sortimex(){
		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/inicio');
		}else{
			$data_fotter['scripts'] = ["Login_general.js"];
			$data['title'] = "SORTIMEX";
			echo view('Login/Sortimex' ,  $data);
			echo view('fotter_panel', $data_fotter);
		}
	}

	public function asiatodo(){
		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/inicio');
		}else{
			$data_fotter['scripts'] = ["Login_general.js"];
			$data['title'] = "ASIATODO";
			echo view('Login/Asiatodo' ,  $data);
			echo view('fotter_panel', $data_fotter);
		}
	}

	public function optisort(){
		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/inicio');
		}else{
			$data_fotter['scripts'] = ["Login_general.js"];
			$data['title'] = "OPTISORT";
			echo view('Login/Optisort' ,  $data);
			echo view('fotter_panel', $data_fotter);
		}
	}

	public function pyron(){
		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/inicio');
		}else{
			$data_fotter['scripts'] = ["Login_general.js"];
			$data['title'] = "PYRON";
			echo view('Login/Pyron' ,  $data);
			echo view('fotter_panel', $data_fotter);
		}
	}

	public function solifood(){
		$session = session();
		if( $session->get('logged_in') != null){
			return redirect()->to(base_url().'/inicio');
		}else{
			$data_fotter['scripts'] = ["Login_general.js"];
			$data['title'] = "SOLIFOOD";
			echo view('Login/Solifood' ,  $data);
			echo view('fotter_panel', $data_fotter);
		}
	}
}