<?php

//namespace FastRegister;


add_action( 'widgets_init', function(){
	register_widget( 'My_Widget' );
});


	class My_Widget extends WP_Widget {
		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
					'My_Widget', // Base ID
					__('CRG FastRegister', 'text_domain'), // Name
					array( 'description' => __( 'Easily register and log in users', 'text_domain' ), ) // Args
					);
		}
		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {

			echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}
			echo __( 'Hello, World!', 'text_domain' );
			echo $args['after_widget'];
		}
		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$title = __( 'Sign Up for My Newsletter', 'text_domain' );
			?>
<div id = 'FastRegisterWidget'>
	<h3>Sign up for my newsletter:</h3>
	<form method = 'post'>
	Email:
	<input type  = 'text' name = 'CRG-fast-register-email' id = 'CRG-fast-register-email' placeholder = 'Type your email here' />
	<br />
	<input type = "submit" />
	</form>
</div> <!-- END:FastRegisterWidget -->
		<?php 
	}
	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // class My_Widget