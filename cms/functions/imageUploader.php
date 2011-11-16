<?php session_start();
	require("connectToDatabase.php");
	if(strcmp($_GET["location"],"gallery")==0){
		echo 'found location';
		$photos = $_FILES["photoNames"];
		$captions = $_POST["photoCaptions"];
		$photo_types = array(      
  		'image/pjpeg' => 'jpg',    
  		'image/jpeg' => 'jpg',    
  		'image/gif' => 'gif',    
  		'image/bmp' => 'bmp',    
		'image/x-png' => 'png'
		);
	
		for($counter=0;$counter<count($photos);$counter++){
			if(!array_key_exists($photos['type'][$counter], $photo_types)){
				return false;
			}else{
				$query = 'INSERT INTO GalleryPhotos(PhotoID, PhotoCaption, PhotoCatagory)
							VALUES("","'.$captions[$counter].'","'.$_POST["catagory"].'")';
				mysql_query($query);
				
				$new_id = mysql_insert_id();
				
				$fileType = $photos['type'][$counter];
				$extention = $photo_types[$fileType];
				$fileName = "$new_id.$extention";
				
				$query = "UPDATE GalleryPhotos SET PhotoName = '".$fileName."' WHERE PhotoID = '".$new_id."'";
				
				mysql_query($query);
				
				move_uploaded_file($photos['tmp_name'][$counter],"../../gallery/".$fileName);
				
				$size = GetImageSize("../../gallery/" . $fileName);      
      
				// Wide Image      
				if($size[0] > $size[1])      
				{      
					$thumbnail_width = 300;      
 					$thumbnail_height = (int)(300 * $size[1] / $size[0]);      
				}      
      
				// Tall Image      
				else      
				{      
 					$thumbnail_width = (int)(300 * $size[0] / $size[1]);      
  					$thumbnail_height = 300;      
				}
				
				$gd_function_suffix = array(        
  					'image/pjpeg' => 'JPEG',      
  					'image/jpeg' => 'JPEG',      
  					'image/gif' => 'GIF',      
  					'image/bmp' => 'WBMP',      
 					'image/x-png' => 'PNG'      
				);
				
				$function_suffix = $gd_function_suffix[$fileType];
				$function_to_read = 'ImageCreateFrom' . $function_suffix;
				$function_to_write = 'Image' . $function_suffix;
				
				$sourceHandle = $function_to_read('../../gallery/'.$fileName);
				
				if ($sourceHandle) {      
  				// Let's create a blank image for the thumbnail      
 					 $thumbnail = ImageCreate($thumbnail_width, $thumbnail_height);
   					 ImageCreateTrueColor($thumbnail_width, $thumbnail_height);
   					 
   					 // Now we resize it      
  					ImageCopyResampled($thumbnail, $sourceHandle,      
    				0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $size[0], $size[1]);
				}
				
				$function_to_write($thumbnail, '../../gallery/thumbnails/tb_' . $fileName);
				ImageDestroy($thumbnail);
				
				}
				echo "finished";
		}
		
	}	
	mysql_close($conn);
	header("../gallery.php");
	exit();
?>