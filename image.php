<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>

			<h2 class="page-title"><a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php printf( __( 'Zur&uuml;ck zu %s', 'sandbox' ), wp_specialchars( get_the_title($post->post_parent), 1 ) ) ?>" rev="attachment"><?php echo get_the_title($post->post_parent) ?></a></h2>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h3 class="entry-title"><?php the_title() ?></h3>
				<div class="entry-content">
					<div class="entry-attachment"><a href="<?php echo wp_get_attachment_url($post->ID); ?>" title="<?php echo wp_specialchars( get_the_title($post->ID), 1 ) ?>" rel="attachment"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a></div>
					<div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>
<?php the_content() ?>

				</div>

				<div class="entry-meta">
					<?php printf( __( 'Dieser Eintrag wurde geschrieben von %1$s, ver&ouml;ffentlicht am  <abbr class="published" title="%2$sT%3$s">%4$s at %5$s</abbr> und abgelegt unter %6$s%7$s. Setze ein Lesezeichen auf den <a href="%8$s" title="Permalink to %9$s" rel="bookmark">Permalink</a>. Verfolge alle Kommentare mit dem <a href="%10$s" title="Comments RSS to %9$s" rel="alternate" type="application/rss+xml">RSS-Feed zu diesem Beitrag</a>.', 'sandbox' ),
						'<span class="author vcard"><a class="url fn n" href="' . get_author_link( false, $authordata->ID, $authordata->user_nicename ) . '" title="' . sprintf( __( 'View all posts by %s', 'sandbox' ), $authordata->display_name ) . '">' . get_the_author() . '</a></span>',
						get_the_time('d m Y'),
						get_the_time('H:i:sO'),
						the_date( '', '', '', false ),
						get_the_time(),
						get_permalink(),
						the_title_attribute('echo=0'),
						comments_rss() ) ?>

<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>
					<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Hinterlasse einen Kommentar</a> oder einen Trackback: <a class="trackback-link" href="%s" title="Trackback URL f&uuml;r Deinen Beitrag" rel="trackback">Trackback URL</a>.', 'sandbox' ), get_trackback_url() ) ?>
<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>
					<?php printf( __( 'Kommentare sind geschlossen, aber Du kannst einen Trackback setzen: <a class="trackback-link" href="%s" title="Trackback URL f&uuml;r Deinen Beitrag" rel="trackback">Trackback URL</a>.', 'sandbox' ), get_trackback_url() ) ?>
<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>
					<?php _e( 'Trackbacks sind nicht m&ouml;glich, aber Du kannst <a class="comment-link" href="#respond" title="einen Kommentar hinterlassen">einen Kommentar hinterlassen</a>.', 'sandbox' ) ?>
<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
					<?php _e( 'Kommentare und Trackbacks sind zur Zeit nicht m&ouml;glich', 'sandbox' ) ?>
<?php endif; ?>
<?php edit_post_link( __( 'Bearbeiten', 'sandbox' ), "\n\t\t\t\t\t<span class=\"edit-link\">", "</span>" ) ?>

				</div>
			</div><!-- .post -->

			<div id="nav-images" class="navigation">
				<div class="nav-previous"><?php previous_image_link() ?></div>
				<div class="nav-next"><?php next_image_link() ?></div>
			</div>

<?php comments_template() ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>