<?php
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

?>