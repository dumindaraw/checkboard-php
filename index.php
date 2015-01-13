<?php

class Checkerboard 
{
	private $boardSize;
	private $squareSize;
	
	public function __construct($sSize = 1, $bSize = 1){
		$this->boardSize = $bSize;
		$this->squareSize = $sSize;
	}

	public function drawBoard(){
	
		if($this->boardSize > 0 && $this->squareSize > 0){
			echo "<table>";
			$cellCount = 0;
			$rowCount = 0;

			for ($i=0; $i < $this->boardSize; $i++) {
			
				++$rowCount;
			
				echo "<tr><td colspan = $this->boardSize>".$this->drawRowSeperator()."</td></tr>";
				echo "<tr>"; 
		
				if($rowCount % 2 == 0)
				{
					$cellCount = $this->boardSize * $rowCount;
					
					for ($j=$cellCount ; $j > (($rowCount - 1) * $this->boardSize); $j--) { 
	
						if($j % 2 == 0){
							echo "<td>"; 
							echo $this->drawInnerPattern(true);
							echo "</td>"; 
						}
						else
						{
							echo "<td>"; 
							echo $this->drawInnerPattern(false);
							echo "</td>"; 
						}						
					}
				}
				else
				{
					for ($k=$cellCount  + 1; $k < $this->boardSize * $rowCount + 1; $k++) { 

						++$cellCount;

						if($k % 2 == 0){
							echo "<td>"; 
							echo $this->drawInnerPattern(true);
							echo "</td>"; 
						}
						else
						{
							echo "<td>"; 
							echo $this->drawInnerPattern(false);
							echo "</td>"; 
						}
					}
				}
				echo "<tr/>";	
			}
			echo "<tr><td colspan = $this->boardSize>".$this->drawRowSeperator()."</td></tr>";
		}
		else
		{
			echo "You should have a valid combination of inputs !";
		}
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

	private function drawInnerPattern($fillEmpty = false){
		$sSize = $this->squareSize;
		$innerStr = "";

		if(!$fillEmpty){
			for ($i=0; $i < $sSize; $i++) { 
				$innerStr .= "| ";
				for ($j=0; $j < $sSize; $j++) {
					$innerStr .= "#";
				}
				$innerStr .= "<br/>";
			}

		}
		else
		{
			for ($i=0; $i < $sSize; $i++) { 
				$innerStr .= "| ";
				for ($j=0; $j < $sSize; $j++) {
					$innerStr .= " ";
				}
				$innerStr .= "<br/>";
			}
		}
		return $innerStr;
	}
}

$board = new Checkerboard(4,4);

echo $board->drawBoard();
?>