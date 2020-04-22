SET @dominioantiguo = 'dominioantiguo.com';
SET @dominionuevo   = 'dominionuevo.com';
UPDATE wp_options SET option_value = REPLACE ( option_value, @dominioantiguo, @dominionuevo );
UPDATE wp_posts SET guid = REPLACE ( guid, @dominioantiguo, @dominionuevo );
UPDATE wp_posts SET post_content = REPLACE ( post_content, @dominioantiguo, @dominionuevo );
UPDATE wp_postmeta SET meta_value = REPLACE ( meta_value, @dominioantiguo, @dominionuevo );
