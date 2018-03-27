<!--活動花絮-->
    <section id="album" class="portfolio bg-green">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>活動花絮</h2>
                    <hr class="small">
                    <h4>Albums</h4>
                    <div class="row"> <!--相簿顯示-->
                        <div>
                            	<?php
                            		if (is_array($portfolio)) {
                            			$col = 0;
                            			$row = 0;
                            			foreach($portfolio as $item) {
                            				if ($col == 0) {
                            					echo "<tr>\n";
                            				}
                            				echo "<div class='col-md-6'>\n";
                            				echo "<div class='portfolio-item'>\n";
                            				echo "<a href='".site_url('portfolio/detail/').$item['id']."'>\n";
                            				echo "<img class='img-portfolio img-responsive'";
                            				echo "src='".base_url('userfile/images/portfolio/').$item['img']."'";
                            				echo "alt='".$item['title']."'>\n";
                            				echo "</a>\n";
                            				echo "<p style='font-size: 20px'>";
                            				echo $item['title'];
                            				echo "</p>\n";
                            				echo "</div>\n";
                            				echo "</div>\n";
                            				if ($col == 2) {
                            					$col = 0;
                            					echo "</tr>\n";
                            				} else {
                            					$col ++;
                            				}
                            			}
                            		}
                            	?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
    </section>
