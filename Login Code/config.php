<?php

//----------------------------------
// Database Info

// DB Name
define('DB_NAME', 'connhkab_users');

// DB Username
define('DB_USER', 'connhkab_root');  // TO-DO: Once functionality is solid, try replacing with more limited user for security purposes

// DB Password
define('DB_PASS', 'k,_@+v2wR#eS');

//----------------------------------
// Salt Info

// Site key
/**
 * Abby's Note:
 * The tutorial for the login functionality glossed over exactly how to obtain and implement a site key.
 * I followed a few articles on site keys, and from what I could tell the main way to obtain one is through
 * Google reCAPTCHA. After obtaining the Site and Secret Keys though, I had difficulty understanding exactly
 * how to fully connect them to our application. Since the tutorial is only using the site key for salting,
 * I have not integrated the full reCAPTCHA validation yet.
 * Sources:
 *  - https://www.namecheap.com/support/knowledgebase/article.aspx/10345/2194/how-to-install-captcha-on-your-website/
 *  - https://developers.google.com/recaptcha/intro
 *      - And other pages of Google documentation branching off from the previous two links.
 *  - https://phppot.com/php/how-to-get-google-recaptcha-site-and-secret-key/
 */
define('SITE_KEY', '6Ld46mIjAAAAANaVKD09vWTEvbZyww9QGC5PmfxA');

// NONCE salt
define('NONCE_SALT', '/q]Dw1X18+|;$:_U2R5x777S0 &%/JMFVk0c\xO=)Gs+HBnw#a');

// AUTH salt
define('AUTH_SALT', 'kF{e+<,;M_H#0=q*o/1f*LU)aGh=P6,9TIbrDM40Y`~#_HLY^I');

?>