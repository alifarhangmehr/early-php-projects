<?php
class myfile{
function Zip($source, $destination)
{
    if (extension_loaded('zip') === true)
    {
        if (file_exists($source) === true)
        {
                $zip = new ZipArchive();

                if ($zip->open($destination, ZIPARCHIVE::CREATE) === true)
                {
                        //$source = realpath($source);

                        if (is_dir($source) === true)
                        {
                                $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

                                foreach ($files as $file)
                                {
                                        //$file = realpath($file);

                                        if (is_dir($file) === true)
                                        {
                                                //$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
                                        }

                                        else if (is_file($file) === true)
                                        {
                                                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
                                        }
                                }
                        }

                        else if (is_file($source) === true)
                        {
                                //$zip->addFromString(basename($source), file_get_contents($source));
                        }
                }

                return $zip->close();
        }
    }

    return false;
}






function deleteAll($directory, $empty = false) {
    if(substr($directory,-1) == "/") {
        $directory = substr($directory,0,-1);
    }

    if(!file_exists($directory) || !is_dir($directory)) {
        return false;
    } elseif(!is_readable($directory)) {
        return false;
    } else {
        $directoryHandle = opendir($directory);
       
        while ($contents = readdir($directoryHandle)) {
            if($contents != '.' && $contents != '..') {
                $path = $directory . "/" . $contents;
               
                if(is_dir($path)) {
                    deleteAll($path);
                } else {
                    unlink($path);
                }
            }
        }
       
        closedir($directoryHandle);

        if($empty == false) {
            if(!rmdir($directory)) {
                return false;
            }
        }
       
        return true;
    }
} 

function uploadPhoto($photo,$location,$id){

//-------------------------------------------------------------- Start save image ------------------------------------------ 

 if (($photo["type"] == "image/jpeg")
|| ($photo["type"] == "image/pjpeg")
|| ($photo["type"] == "image/jpg")
&& ($photo["size"] < 1000000) )
  { 
  
  if ($photo["error"] > 0)
    {
    }
  else
    { 
	if (file_exists($location.$photo["name"]))
      {

      }
    else
      {
	  //rename file
	  $temp=explode('.',$photo["name"]);
	  // ****************************************** replace with session name *******
	  $temp[0]=$id;
	  $extension= $temp[1];
	  
	  $temp=implode('.',$temp);
	  $sorceFile=$photo["tmp_name"];
      move_uploaded_file($photo["tmp_name"], $location.$temp);
	  $file1=$location.$temp;
	  $file2=$location.'source'.$temp;
	  copy($file1,$file2);
	  $photoThumb=$location."thumb".$temp;
	  $photoSource=$location."source".$temp;
	   //---- make thumbnail -----  php.ini=extension:extension=php_gd.dll
	  $oSourceImage=$location.$temp;
	 $oSourceImage=imagecreatefromjpeg($oSourceImage);
	  
	$nWidth = imagesx($oSourceImage); // get original source image width
	$nHeight = imagesy($oSourceImage); // and height
    $nesbat=$nHeight/$nWidth;

	if($nWidth>=$nHeight){
	$nDestinationWidth=110;
	$nDestinationHeight=$nDestinationWidth*$nesbat;}
	else{
	$nDestinationWidth=80;
	$nDestinationHeight=$nDestinationWidth*$nesbat;}
	
$oDestinationImage = imagecreatetruecolor($nDestinationWidth, $nDestinationHeight);

$oResult = imagecopyresampled(
	$oDestinationImage, $oSourceImage,
	0, 0, 0, 0,
	$nDestinationWidth, $nDestinationHeight,
	$nWidth, $nHeight); // resize the image

	ob_start(); // Start capturing stdout.
	imagejpeg($oDestinationImage); // As though output to browser.
	$sBinaryThumbnail = ob_get_contents(); // the raw jpeg image data.
	
	//newst 
	unlink ($location.$temp);
	ob_end_clean(); // Dump the stdout so it does not screw other output.
 
	   //----end of make thumbnail ----- 
	   
	   //  save thumb in hdd error : move_uploaded_file($sBinaryThumbnail,"../upload/" . $name."thumb".$extension);
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';   
	   // ----------  SHOW THUMBNAIL -------
	   
	   // act as a jpg file to browser 
	   //  save thumbnail
	   imagejpeg($oDestinationImage,$location.thumb.$temp,80); 
	   
	   $thumbimage=$location.thumb.$temp;
	 echo '<br><br><br><br><br><div align="center"><img src="'.$thumbimage.'"  /></div><br>';
	   // ----------END OF  SHOW THUMBNAIL -------
      }
    }  
	return true;
  }
else
  {
  echo '<p align=center dir=rtl style="font-family:tahoma">'.$file_photo_upload.'</p>';
  return false;
  exit();
  }  
 //-------------------------------------------------------------- End save image ------------------------------------------ 
}

}


?>