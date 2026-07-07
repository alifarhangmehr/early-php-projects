<!DOCTYPE html>
<html>
  <head>
    <title>تبدیل اعداد به حروف</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body>
    <div class="container">
      <?php
      if (!isset($_POST['number']))
        $_POST['number'] = '123499912399909890009996789900095464';
      ?>
      <form id="num-to-words" action="index.php" method="post">
        <input type="text" name="number" value="<?php print $_POST['number']; ?>" class="validate[required,min[0],maxSize[36],custom[integer]]" data-prompt-position="inline" />
        <input type="submit" value="تبدیل" />
        <div class="converted">
          <?php
          if (isset($_POST['number']) && is_numeric($_POST['number'])) {
            include './NumToWord_Fa.php';
            $numToWord = new numToWord_Fa();
            print $numToWord->number_format($_POST['number']);
            print '<br/>';
            print $numToWord->numberToWords($_POST['number']);
          }
          ?>
        </div>
      </form>
    </div>
  </body>
</html>