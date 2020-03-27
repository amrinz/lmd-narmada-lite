<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		This post is password protected. Enter the password to view comments.
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	
	<h2 id="comments" class="comments-title"><?php comments_number( __( '<span>No</span> Responses', 'lombokmedia' ), __( '<span>One</span> Response', 'lombokmedia' ), _n( '<span>%</span> Response', '<span>%</span> Responses', get_comments_number(), 'lombokmedia' ) );?> to &#8220;<?php the_title(); ?>&#8221;</h2>

	<ol class="comment-list">
		<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
	
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<p>Comments are closed.</p>

	<?php endif; ?>
	
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">

	<h2 class="comments-title"><?php comment_form_title( 'Leave a Reply', 'Leave a Reply to %s' ); ?></h2>

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="form-horizontal" role="form">

		<?php if ( is_user_logged_in() ) : ?>

			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

		<?php else : ?>

			<div class="form-group row">
				<label class="col-form-label col-sm-3" for="author" >Name <?php if ($req) echo "(required)"; ?></label>
				<div class="col-sm-9">
					<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" class="form-control" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-form-label col-sm-3" for="email" >Email <?php if ($req) echo "(required)"; ?></label>
				<div class="col-sm-9">
					<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" class="form-control" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				</div>
			</div>

			<div class="form-group row">
				<label class="col-form-label col-sm-3" for="url" >Website</label>
				<div class="col-sm-9">
					<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" class="form-control" tabindex="3" />
				</div>
			</div>

		<?php endif; ?>

		<div class="form-group row">
			<label class="col-form-label col-sm-3">Comment</label>
			<div class="col-sm-9">
				<textarea name="comment" id="comment" rows="10" class="form-control" tabindex="4"></textarea>
			</div>
		</div>

		<div class="form-group row">
			<div class="offset-sm-3 col-sm-9">
				<input name="submit" type="submit" id="submit" tabindex="5" value="Send" class="btn-send-comment"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="offset-sm-3 col-sm-9">
				<?php comment_id_fields(); ?>
			</div>
		</div>
		
		<?php do_action('comment_form', $post->ID); ?>

	</form>

	<?php endif; // If registration required and not logged in ?>
	
</div>

<?php endif; ?>
