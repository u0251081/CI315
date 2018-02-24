

				
				
				<div id="pagination">
					<span class="all"><?php echo 'Page '.$current.' of '.$amount; ?></span>
					<?php for($i=1; $i<=$amount; $i++) {
						if ($i == $current) 
							echo '<span class="current">'.$i.'</span>';
						else 
							echo '<a href="'.base_url('index.php/home/page/').$i.'" class="inactive">'.$i.'</a>';
						} 
					?>

				</div>