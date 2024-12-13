<?php

// debug function
if (!function_exists('debug')) {
    function debug($data)
    {
        echo '<pre>';
        print_r($data);
        die();
    }
}

// upload file function
if (!function_exists('upload_file')) {
    function upload_file($folder, $file, $maxFileSize = 100 * 1024 * 1024) // Default: 100 MB
    {
        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $allowedVideoTypes = ['video/mp4', 'video/avi', 'video/mov', 'video/mpeg'];

        // Check if a file is uploaded
        if (!isset($file['tmp_name']) || empty($file['tmp_name'])) {
            throw new Exception('No file uploaded');
        }

        // Validate file size
        if ($file['size'] > $maxFileSize) {
            throw new Exception('File size exceeds the maximum limit');
        }

        // Validate file type
        $fileType = mime_content_type($file['tmp_name']);
        if (!in_array($fileType, array_merge($allowedImageTypes, $allowedVideoTypes))) {
            throw new Exception('Unsupported file type');
        }

        // Ensure the upload folder exists
        $uploadPath = PATH_ASSETS_UPLOAD . $folder;
        if (!is_dir($uploadPath)) {
            if (!mkdir($uploadPath, 0777, true)) {
                throw new Exception('Failed to create upload directory');
            }
        }

        // Generate a unique file name
        $targetFile = $uploadPath . '/' . time() . '-' . str_replace(' ', '_', basename($file['name']));

        // Move the uploaded file
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return $folder . '/' . basename($targetFile); // Return relative path
        }

        throw new Exception('File upload failed');
    }
}
