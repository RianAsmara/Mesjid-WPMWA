<?php 
    $name      = get_bloginfo('name');
    $themePath = get_template_directory_uri();

    $list = [
        '/',
        '/style.css',
        '/img/16.png',
        '/img/apple-touch-icon-120x120.png',
        '/img/32.png',
        '/img/310.png', 
        '/img/192.png', 
        '/img/144.png', 
        '/img/512.png', 
    ];

    $list = array_map( function($u) use($themePath){
        if ($u === '/')
            return $u;

        return $themePath . $u; 
    }, $list);
    
?>
self.addEventListener('install', function(e) {
  e.waitUntil(
      caches.open('<?php echo $name?>').then(function(c){
          return c.addAll([
            <?php echo '"' . implode('","', $list) . '"' ?>
          ]) ; 
      })            
  );
});
