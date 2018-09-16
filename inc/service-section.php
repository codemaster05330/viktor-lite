<?php

function viktor_lite_services_section(){
    global $viktor_lite;


    $icon = array(
        'serv_icon_1' => (!empty($viktor_lite['serv_icon_1'])) ? $viktor_lite['serv_icon_1'] : 'flaticon-graph', 
        'serv_icon_2' => (!empty($viktor_lite['serv_icon_2'])) ? $viktor_lite['serv_icon_2'] : 'flaticon-briefcase', 
        'serv_icon_3' => (!empty($viktor_lite['serv_icon_3'])) ? $viktor_lite['serv_icon_3'] : 'flaticon-piggy-bank', 
    );
    $titles = array(
        'serv_title_1' => (!empty($viktor_lite['serv_title_1'])) ? $viktor_lite['serv_title_1'] : esc_html__('Business Plan','viktor-lite'), 
        'serv_title_2' => (!empty($viktor_lite['serv_title_2'])) ? $viktor_lite['serv_title_2'] : esc_html__('Funding Stragey','viktor-lite'), 
        'serv_title_3' => (!empty($viktor_lite['serv_title_3'])) ? $viktor_lite['serv_title_3'] : esc_html__('Saving Money','viktor-lite'), 
    );
    $text = array(
        'serv_text_1' => (!empty($viktor_lite['serv_text_1'])) ? $viktor_lite['serv_text_1'] : esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.','viktor-lite'), 
        'serv_text_2' => (!empty($viktor_lite['serv_text_2'])) ? $viktor_lite['serv_text_2'] : esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.','viktor-lite'), 
        'serv_text_3' => (!empty($viktor_lite['serv_text_3'])) ? $viktor_lite['serv_text_3'] : esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.','viktor-lite'), 
    );
    $buttonlabel = array(
        'serv_readbtn_1' => (!empty($viktor_lite['serv_readbtn_1'])) ? $viktor_lite['serv_readbtn_1'] : esc_html__('Read More','viktor-lite'),  
        'serv_readbtn_2' => (!empty($viktor_lite['serv_readbtn_2'])) ? $viktor_lite['serv_readbtn_2'] : esc_html__('Read More','viktor-lite'),  
        'serv_readbtn_3' => (!empty($viktor_lite['serv_readbtn_3'])) ? $viktor_lite['serv_readbtn_3'] : esc_html__('Read More','viktor-lite'),  
    );
    $buttonurl = array(
        'serv_readbtnurl_1' => (!empty($viktor_lite['serv_readbtnurl_1'])) ? $viktor_lite['serv_readbtnurl_1'] : '#',  
        'serv_readbtnurl_2' => (!empty($viktor_lite['serv_readbtnurl_2'])) ? $viktor_lite['serv_readbtnurl_2'] : '#',  
        'serv_readbtnurl_3' => (!empty($viktor_lite['serv_readbtnurl_3'])) ? $viktor_lite['serv_readbtnurl_3'] : '#',  
    );

	?>
		<div class="service-area"> 
			<div class="container"> 

                <?php $s = 1; ?>
                <?php foreach ($titles as $key => $title) {
                    if ( $title ) {
                        ?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							    <div class="single-service">
							        <div class="media"> 
							          <div class="media-body text-center">
                                        <a href="<?php echo esc_url($buttonurl['serv_readbtnurl_'.$s]); ?>">
                                          <span class="<?php echo esc_attr($icon['serv_icon_'.$s]); ?>"></span>
                                        </a>
							            <h4 class="media-heading"><a href="<?php echo esc_url($buttonurl['serv_readbtnurl_'.$s]); ?>"><?php echo esc_html($titles['serv_title_'.$s]); ?></a></h4>
							            <p><?php echo esc_textarea($text['serv_text_'.$s]); ?></p>
							            <div class="read-more">
							                <a href="<?php echo esc_url($buttonurl['serv_readbtnurl_'.$s]); ?>"><?php echo esc_html($buttonlabel['serv_readbtn_'.$s]); ?>  <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
							            </div>
							          </div>
							        </div>
							    </div>
							</div>
                        <?php
                    }
                    $s++;
                } ?>   
			</div>
		</div>
	
	<?php
}
