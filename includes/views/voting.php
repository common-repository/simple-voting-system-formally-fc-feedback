<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


$post_id = get_the_ID();
$encoded_id = base64_encode($post_id);
$user_ip = sanitize_text_field($_SERVER['REMOTE_ADDR']);
$user_has_voted = get_post_meta($post_id, 'svsfc_feedback_voted_' . $user_ip , true);

if($user_has_voted){
    $hide_class = '';
    $svsfc_vote = '';
}else{
    $hide_class = 'svsfc-hide';
    $svsfc_vote = 'svsfc-vote';
}

if($user_has_voted === 'positive'){
    $yes_class = 'svsfc-active';
    $no_class = '';
}elseif($user_has_voted === 'negative'){
    $yes_class = '';
    $no_class = 'svsfc-active';
}else{
    $yes_class = '';
    $no_class = '';
}
//As this is same instance include file.
$data = $this->get_vote_count_by_postid($post_id);

?>
<div class="svsfc-feedback-form">
    <div class="svsfc-row">
        <div class="svsfc-content">
            <?php echo esc_html__( 'WAS THIS ARTICLE HELPFUL?', 'svsfc-feedback' ); ?>
        </div>
        <div class="svsfc-buttons svsfc-target-btns">
            <div class="button <?php  echo esc_attr($svsfc_vote) .' '.  esc_attr($yes_class) ?>" data-vote-type="positive" data-post-id="<?php echo esc_attr($encoded_id); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>
                </svg>
                <p><?php echo esc_html__( 'Yes', 'svsfc-feedback' ); ?></p>
            </div>
            <div class="button  <?php echo esc_attr($svsfc_vote) .' '. esc_attr($no_class) ?>" data-vote-type="negative" data-post-id="<?php echo esc_attr($encoded_id); ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM176.4 176a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm128 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM160 336H352c8.8 0 16 7.2 16 16s-7.2 16-16 16H160c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                </svg>
                <p><?php echo esc_html__( 'No', 'svsfc-feedback' ); ?></p>
            </div>
        </div>
        <div class="svsfc-loading-line svsfc-hide"><?php echo esc_html__( 'Loading...', 'svsfc-feedback' ); ?></div>
    </div>
    <div class="svsfc-row <?php echo esc_attr($hide_class) ?>">
        <div class="svsfc-content">
            <?php echo esc_html__( 'THANK YOU FOR YOUR FEEDBACK', 'svsfc-feedback' ); ?>        </div>
        <div class="svsfc-buttons">
            <div class="button svsfc-answer-yes <?php echo esc_attr($yes_class) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM164.1 325.5C182 346.2 212.6 368 256 368s74-21.8 91.9-42.5c5.8-6.7 15.9-7.4 22.6-1.6s7.4 15.9 1.6 22.6C349.8 372.1 311.1 400 256 400s-93.8-27.9-116.1-53.5c-5.8-6.7-5.1-16.8 1.6-22.6s16.8-5.1 22.6 1.6zM144.4 208a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm192-32a32 32 0 1 1 0 64 32 32 0 1 1 0-64z"/>
                </svg>
                <p id="svsfc-yes"><?php echo esc_html($data['yes']); ?></p>
            </div>
            <div class="button svsfc-answer-no <?php echo esc_attr($no_class) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM176.4 176a32 32 0 1 1 0 64 32 32 0 1 1 0-64zm128 32a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM160 336H352c8.8 0 16 7.2 16 16s-7.2 16-16 16H160c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                </svg>
                <p id="svsfc-no"><?php echo esc_html($data['no']); ?></p>
            </div>
        </div>
    </div>
</div>
