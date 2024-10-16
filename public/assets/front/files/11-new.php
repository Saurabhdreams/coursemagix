<?php
$directory = '/var/www'; // يمكن تغيير المسار إلى الدليل الذي تريد استعراضه

// تحقق مما إذا كان الدليل موجودًا
if (is_dir($directory)) {
    // افتح الدليل
    if ($dh = opendir($directory)) {
        echo "<h2>ملفات في الدليل: " . htmlspecialchars($directory) . "</h2>";
        echo "<ul>";
        
        // اقرأ الملفات داخل الدليل
        while (($file = readdir($dh)) !== false) {
            // تجاهل '.' و '..'
            if ($file != '.' && $file != '..') {
                $filePath = $directory . '/' . $file;
                echo "<li><a href='" . htmlspecialchars($filePath) . "'>" . htmlspecialchars($file) . "</a></li>";
            }
        }
        
        echo "</ul>";
        
        // أغلق الدليل
        closedir($dh);
    } else {
        echo "لا يمكن فتح الدليل.";
    }
} else {
    echo "الدليل غير موجود.";
}
?>
