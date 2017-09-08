<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_helper {
	
	public $bracketSize = 2;
	public $rounds = 1;
	public $byes = 0;
	public $tid = 0;

	function set_tid($id)
	{
		$this->tid = $id;
	}
	function set_bracket_size($size)
	{
		$this->bracketSize = $size;
	}

	function set_rounds($round)
	{
		$this->rounds = $round;
	}

	function set_num_byes($bye)
	{
		$this->byes = $bye;
	}

	function get_bracket_size()
	{
		return $this->bracketSize;
	}

	function get_rounds()
	{
		return $this->rounds;
	}

	function get_num_byes()
	{
		return $this->bye;
	}

	function get_tid()
	{
		return $this->tid;
	}
}