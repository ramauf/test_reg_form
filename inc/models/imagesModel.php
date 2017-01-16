<?php
class imagesModel{
	public static function upload($source, $fileName){
		$imageData = getimagesize($source);
		if (!$imageData) return '';//Если нет ничего общего с рисунком		@move_uploaded_file($source, $fileName);
		if (file_exists($fileName)){
			$newWidth = min(650, $imageData[0]);
			$newHeight = round($imageData[1]*$newWidth/$imageData[0]);
			$dest = imagecreatetruecolor($newWidth, $newHeight);
			switch ($imageData['mime']) {
				case "image/jpg":
				case "image/jpeg":
					$func1 = 'imagecreatefromjpeg';
					$func2 = 'imagejpeg';
					$ext = 'jpeg';//Расширение прописываем руками, чтобы скрипты не залили
				break;
				case "image/png":
					$func1 = 'imagecreatefrompng';
					$func2 = 'imagepng';
					$ext = 'png';
				break;
				case "image/gif":
					$func1 = 'imagecreatefromgif';
					$func2 = 'imagegif';
					$ext = 'gif';
				break;
				default://Если файл не по формату, то удалим, чтобы скрипты не залили
					unlink($fileName);
					return '';
				break;
			}
			$src = @$func1($fileName);
			@imagecopyresampled($dest, $src, 0, 0, 0, 0, $newWidth, $newHeight, $imageData[0], $imageData[1]);
			@$func2($dest, $fileName.'.'.$ext);
			imagedestroy($dest);
			imagedestroy($src);
			unlink($fileName);//Удалим оригинал
			return end(preg_split('|[/\\\]|', $fileName.'.'.$ext));//Вернем пережатый рисунок с расширением
		}	}
}
