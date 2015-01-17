<?php

class Checkerboard 
{
	private $boardSize;
	private $squareSize;
	private $rowCount = 0;
	private $cellCount = 0;

	
	public function __construct($sSize = 1, $bSize = 1){

		$this->boardSize = $bSize;
		$this->squareSize = $sSize;
	}

	public function drawBoard(){

		for ($i=0; $i < $this->boardSize; $i++) { 

			echo $this->drawRowSeperator();	
			echo nl2br("\n");

			$this->rowCount++;

			for ($j=0; $j < $this->squareSize; $j++) { 
					echo $this->drawInnerPattern();
					echo nl2br("\n");
			}
	
		}
		echo $this->drawRowSeperator();	
		
	}

	private function drawRowSeperator(){

		$bSize = $this->boardSize;
		$sSize = $this->squareSize;

		$seperatorStr = "";
		
		for ($i=0; $i < $bSize; $i++) { 
			$seperatorStr.="+";
			for ($j=0; $j < $sSize; $j++) { 
				$seperatorStr.=" - ";
			}
		}
		$seperatorStr.=" + ";

		return $seperatorStr;
	}

	private function drawInnerPattern(){

		$sSize = $this->squareSize;
		$innerStr = "";
		$space = " * "; 

		$bSize = $this->boardSize;
		$sSize = $this->squareSize;

		if($this->rowCount % 2 == 0)
		{
			$this->cellCount = $bSize*$this->rowCount;	
		}
		else
		{			
			$this->cellCount = ($this->rowCount-1) * $bSize + 1;
		}

		for ($i=0; $i < $bSize; $i++) { 
		
			$innerStr.="|";

				if($this->rowCount % 2 == 0)
				{									
					if($this->cellCount % 2 == 0)
					{					
						for ($j=0; $j < $sSize; $j++) {
							
							$innerStr.= $space;
						} 
					}
					else
					{						
						for ($k=0; $k < $sSize; $k++) {
						
							$innerStr.=" # ";
						} 
					}
					$this->cellCount--;
				}
				else
				{	

					if($this->cellCount % 2 == 0)
					{						
						for ($l=0; $l < $sSize; $l++) {
							
							$innerStr.= $space;
						} 
					}
					else
					{					
						for ($m=0; $m < $sSize; $m++) {
						
							$innerStr.=" # ";
						} 
					}
					$this->cellCount++;
				}
			
		}

		$innerStr.=" | ";

		return $innerStr;
	}
}

$board = new Checkerboard(4,4);

echo $board->drawBoard();
?>