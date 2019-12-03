<?php
  if(!isset($page)) {
    $page = array("title"=>"Campus Snapshot",
                  "styles"=>array());
  }
?>

<!doctype html>
<html lang="en">
  <head>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-153647613-1"></script>
      <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-153647613-1');
      </script>

      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?php echo $page['title']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="tpl/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <?php foreach($page['styles'] as $i) { ?>
      <link href="tpl/css/<?php echo $i; ?>" rel="stylesheet">
    <?php } ?>

  </head>
