<?php
class Contact_Widget extends WP_Widget {

	public function __construct() {
		parent::__construct(
	 		'contact_widget', 
			'Contact_Widget', 
			array( 'description' => __( 'A Contact Widget', 'text_domain' ), )
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		$errors = array();

		$form = array(
			'c_name' => array(
				'var' => $_POST['c_name'],
				'error' => 'Please fill in your name',
				'validate' => true
			),
			'email' => array(
				'var' => $_POST['email'],
				'error' => 'Please fill in your email address',
				'validate' => true
			),
			'message' => array(
				'var' => $_POST['message'],
				'error' => 'Please fill in your message',
				'validate' => true
			)
		);
		
		
		if($_POST['submit']){
			foreach ($form as $key => $item){
				if(!$item['var'] && $item['validate'] == true) {
					$errors[$key] = $item['error'];
				} elseif( $item['var'] && $item['validate'] == true ) {
					if($key == 'email'){
						if(!preg_match("^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$^", $item['var'])) $errors[$key] = "<div class='error'>Please enter a valid email address</div>" ;
					}
				}
			}
		} else {
			$errors['form'] = 'form not filled in';
		}
		
		if(!$errors) {
			$message = "Tomette website enquiry - {$form['c_name']['var']}\n\n"
			. "Name: {$form['c_name']['var']}\n"
			. "Email: {$form['email']['var']}\n"
			. "Message: {$form['message']['var']}\n";
			
			wp_mail( "joe<joe.swann@littlegiant.co.nz>", "Tomette website enquiry - {$form['c_name']['var']}", $message );
			
			$success = true;
		} 
		
		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title;
			
		echo '<div class="widget-contact">';
		?>
		<?php if(isset($success)) { ?>
			<div class="thanks">
			Thankyou for sending us a message, we will get back to you soon. 
			</div>
			<form action="" method="post">
				<p>
				<label>Name</label> 
				<div class="errors"><?= $errors['c_name'] ?></div>
				<input name="c_name"  type="text" value="<?= $form['c_name']['var'] ?>" />
				</p>
				<p>
				<label>Email</label> 
				<div class="errors"><?= $errors['email'] ?></div>
				<input name="email"  type="text" value="<?= $form['email']['var'] ?>" />
				</p>
				<p>
				<label>Message</label> 
				<div class="errors"><?= $errors['message'] ?></div>
				<textarea name="message" rows="17" cols="20" ><?= $form['message']['var'] ?></textarea>
				</p>
				<p>
					<input name="submit" type="submit" value="Le Send"/>
				</p>
			</form>
		<?php } else { ?>
			<p><?php echo $instance['text'] ?></p>
			<form action="" method="post">
				<p>
				<label>Name</label> 
				<div class="errors"><?= $errors['c_name'] ?></div>
				<input name="c_name"  type="text" value="<?= $form['c_name']['var'] ?>" />
				</p>
				<p>
				<label>Email</label> 
				<div class="errors"><?= $errors['email'] ?></div>
				<input name="email"  type="text" value="<?= $form['email']['var'] ?>" />
				</p>
				<p>
				<label>Message</label> 
				<div class="errors"><?= $errors['message'] ?></div>
				<textarea name="message" rows="17" cols="20" style="<?php 
				if($errors) {
					$height = 290 - (sizeOf($errors) * 22);
					echo 'height:' . $height . 'px';
				} ?>" ><?= $form['message']['var'] ?></textarea>
				</p>
				<p>
					<input name="submit" type="submit" value="Le Send"/>
				</p>
			</form>
			<?php } ?>
		<?php echo '</div>';
		echo $after_widget;
	}
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['text'] =  $new_instance['text'];
		$instance['name'] = strip_tags($new_instance['name']);
		$instance['address'] = strip_tags($new_instance['address']);
		
		return $instance;
	}

	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
		$title = strip_tags($instance['title']);
		$name = strip_tags($instance['name']);
		$address = strip_tags($instance['address']);
		$text = esc_textarea($instance['text']);
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e( 'Name:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
		</p><p>
		<textarea class="widefat" rows="8" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
		</p>
		<?php 
	}

} 

add_action( 'widgets_init', create_function( '', 'register_widget( "contact_widget" );' ) );