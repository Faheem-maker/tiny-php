<?php
return [
    // Whether the site should force SSL (HTTPS mode).
    // Always turn on before deployment
    'HTTPS' => false,
    'session' => [
        /**
         * The logout time in seconds
         * If provided, the session would automatically logout should the user
         * doesn't visit the site during that time. Visiting the site automatically
         * resets this time.
         * 
         * You can set it to `false` to prevent timeout verification automatically.
         */
        'timeout' => 1800,
        /**
         * Whether to Verify the User Agent
         * 
         * If enabled, it would automatically verify the user agent and logout
         * the session if it's mismatched.
         * 
         * Changing it will result in all active sessions being logged out.
         */
        'verify_user_agent' => true,
    ],
];