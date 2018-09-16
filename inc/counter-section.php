<?php
function viktor_lite_counter_section(){
	global $viktor_lite;
	$count_title = !empty($viktor_lite['coun_title']) ? $viktor_lite['coun_title'] : 'We have <span>50 Years</span>';
	$count_subtitle = !empty($viktor_lite['coun_subtitle']) ? $viktor_lite['coun_subtitle'] : 'Of Experiences';
	$count_count_num = array(
		'coun_num_1' => !empty($viktor_lite['coun_num_1']) ? $viktor_lite['coun_num_1'] : esc_html__('3000','viktor-lite'),
		'coun_num_2' => !empty($viktor_lite['coun_num_2']) ? $viktor_lite['coun_num_2'] : esc_html__('2500','viktor-lite'),
		'coun_num_3' => !empty($viktor_lite['coun_num_3']) ? $viktor_lite['coun_num_3'] : esc_html__('1000','viktor-lite'),
	);
	$count_count_txt = array( 
		'coun_txt_1' => !empty($viktor_lite['coun_txt_1']) ? $viktor_lite['coun_txt_1'] : esc_html__('Clients','viktor-lite'),
		'coun_txt_2' => !empty($viktor_lite['coun_txt_2']) ? $viktor_lite['coun_txt_2'] : esc_html__('Projects','viktor-lite'),
		'coun_txt_3' => !empty($viktor_lite['coun_txt_3']) ? $viktor_lite['coun_txt_3'] : esc_html__('Awards','viktor-lite'),
	);
	?>
	<div class="home-counter-down-area">
	    <div class="container">
	        <div class="row">
	            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	                <div class="home-counter-down-title">
	                    <h2><?php echo $count_title; ?></h2>
	                    <p><?php echo $count_subtitle; ?></p>
	                </div>
	            </div>
	            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
	                <div class="ab-count">
	                	<?php $k = 1; 
	                	foreach ($count_count_num as $key => $num) {
	                		if($num){
	                			echo ' <div class="col-md-4">
			                        <div class="about-counter-list">
			                            <h1 class="about-counter">'.$count_count_num['coun_num_'.$k].'</h1>
			                            <p>'.$count_count_txt['coun_txt_'.$k].'</p>
			                        </div>
			                    </div>';
	                		} 
	                		$k++;
	                	} ?> 
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
<?php } ?>