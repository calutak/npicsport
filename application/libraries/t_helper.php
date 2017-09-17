<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_helper {
	
	private $bracketSize = 2;
	private $rounds = 1;
	private $byes = 0;
	private $tid = 0;

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

	function autonumber_id($str)
	{
		$max = strlen($str);
		$end = strlen($str + 1);
		$zeroCount = '';

		for($i=0;$i<$max-$end;$i++)
		{
			$zeroCount .= '0';
		}
		return $zeroCount.($str+1);
	}
}