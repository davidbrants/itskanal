<?php
/**
 * Railway Health Check Endpoint
 *
 * This endpoint is used by Railway to verify the application is running correctly.
 * Returns 200 OK if WordPress is operational.
 *
 * @package iTS_KANAL
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    // Allow health check to run without WordPress for quick responses
    $health_check_mode = true;
}

// Set headers
header( 'Content-Type: application/json' );
header( 'Cache-Control: no-cache, no-store, must-revalidate' );

// Health check response
$health = array(
    'status'    => 'healthy',
    'service'   => 'iTS KANAL WordPress',
    'timestamp' => gmdate( 'Y-m-d H:i:s' ),
    'checks'    => array()
);

// Check 1: PHP is running
$health['checks']['php'] = array(
    'status'  => 'ok',
    'version' => PHP_VERSION
);

// Check 2: Database connection (if WordPress is loaded)
if ( defined( 'ABSPATH' ) ) {
    // WordPress is loaded, check database
    try {
        global $wpdb;
        $wpdb->query( 'SELECT 1' );
        $health['checks']['database'] = array(
            'status'  => 'ok',
            'message' => 'Database connection successful'
        );
    } catch ( Exception $e ) {
        $health['status'] = 'unhealthy';
        $health['checks']['database'] = array(
            'status'  => 'error',
            'message' => 'Database connection failed'
        );
        http_response_code( 503 );
    }
} else {
    // Lightweight database check without loading WordPress
    if ( file_exists( __DIR__ . '/wp-config.php' ) ) {
        // Load database credentials
        require_once __DIR__ . '/wp-config.php';

        try {
            $mysqli = new mysqli( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );

            if ( $mysqli->connect_error ) {
                $health['status'] = 'unhealthy';
                $health['checks']['database'] = array(
                    'status'  => 'error',
                    'message' => 'Database connection failed'
                );
                http_response_code( 503 );
            } else {
                $health['checks']['database'] = array(
                    'status'  => 'ok',
                    'message' => 'Database connection successful'
                );
                $mysqli->close();
            }
        } catch ( Exception $e ) {
            $health['status'] = 'unhealthy';
            $health['checks']['database'] = array(
                'status'  => 'error',
                'message' => 'Database check failed'
            );
            http_response_code( 503 );
        }
    } else {
        $health['checks']['database'] = array(
            'status'  => 'skipped',
            'message' => 'wp-config.php not found'
        );
    }
}

// Check 3: File system write access
$upload_dir = __DIR__ . '/wp-content/uploads';
if ( is_dir( $upload_dir ) && is_writable( $upload_dir ) ) {
    $health['checks']['filesystem'] = array(
        'status'  => 'ok',
        'message' => 'Upload directory is writable'
    );
} else {
    $health['checks']['filesystem'] = array(
        'status'  => 'warning',
        'message' => 'Upload directory may not be writable'
    );
}

// Check 4: Memory usage
$memory_limit = ini_get( 'memory_limit' );
$memory_usage = memory_get_usage( true );
$memory_usage_mb = round( $memory_usage / 1024 / 1024, 2 );

$health['checks']['memory'] = array(
    'status'       => 'ok',
    'limit'        => $memory_limit,
    'usage_mb'     => $memory_usage_mb,
    'peak_usage_mb' => round( memory_get_peak_usage( true ) / 1024 / 1024, 2 )
);

// Set appropriate HTTP status code
if ( $health['status'] === 'healthy' ) {
    http_response_code( 200 );
} else {
    http_response_code( 503 );
}

// Output JSON response
echo json_encode( $health, JSON_PRETTY_PRINT );
exit;
