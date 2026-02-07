
<?php 
echo $header;
$img = "'".env('APP_URL')."public/main/image/bg-new.jpg'";
$class = "{ 'overflow-hidden': isSideMenuOpen }";
echo '<div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="'.$class.'"
    >';
    echo $sidebar;
    echo '<div class="flex flex-col flex-1 w-full">';
        echo $topbar;
        echo '<main class="h-full overflow-y-auto" style="background-color: #5a2e7a8c; background-image: url('.$img.'); background-size: cover;">
                <div class="container px-6 mx-auto grid">';
                    echo $body;
        echo '  </div>
            </main>';
        echo $footer;
    echo '</div>';
    echo $settings;
echo '    </div>
';
echo $footerlink;
?>

