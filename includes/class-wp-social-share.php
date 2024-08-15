<?php

class WP_Social_Share {

    public function run() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_filter('the_content', [$this, 'add_social_share_buttons']);
    }

    public function enqueue_assets() {
        wp_enqueue_style('wp-social-share-style', plugin_dir_url(__FILE__) . '../assets/css/style.css');
        wp_enqueue_script('wp-social-share-script', plugin_dir_url(__FILE__) . '../assets/js/script.js', [], false, true);
    }

    public function add_social_share_buttons($content) {
        if (is_single()) {
            $share_buttons = $this->generate_share_buttons();
            $content .= $share_buttons;
        }
        return $content;
    }

    private function generate_share_buttons() {
        $url = get_permalink();
        $title = get_the_title();

        $facebook_url = "https://www.facebook.com/sharer/sharer.php?u={$url}";
        $twitter_url = "https://twitter.com/share?url={$url}&text={$title}";
        $linkedin_url = "https://www.linkedin.com/shareArticle?url={$url}&title={$title}";
        
        $buttons = '<div class="wp-social-share">';
        $buttons .= "<a href='{$facebook_url}' target='_blank' class='wp-social-share-facebook'>Facebook</a>";
        $buttons .= "<a href='{$twitter_url}' target='_blank' class='wp-social-share-twitter'>Twitter</a>";
        $buttons .= "<a href='{$linkedin_url}' target='_blank' class='wp-social-share-linkedin'>LinkedIn</a>";
        $buttons .= '</div>';

        return $buttons;
    }
}
