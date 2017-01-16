<?php
class imagesModel{
	public static function upload($source, $fileName){
		$imageData = getimagesize($source);
		if (!$imageData) return '';//���� ��� ������ ������ � ��������		@move_uploaded_file($source, $fileName);
		if (file_exists($fileName)){
			$newWidth = min(650, $imageData[0]);
			$newHeight = round($imageData[1]*$newWidth/$imageData[0]);
			$dest = imagecreatetruecolor($newWidth, $newHeight);
			switch ($imageData['mime']) {
				case "image/jpg":
				case "image/jpeg":
					$func1 = 'imagecreatefromjpeg';
					$func2 = 'imagejpeg';
					$ext = 'jpeg';//���������� ����������� ������, ����� ������� �� ������
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
				default://���� ���� �� �� �������, �� ������, ����� ������� �� ������
					unlink($fileName);
					return '';
				break;
			}
			$src = @$func1($fileName);
			@imagecopyresampled($dest, $src, 0, 0, 0, 0, $newWidth, $newHeight, $imageData[0], $imageData[1]);
			@$func2($dest, $fileName.'.'.$ext);
			imagedestroy($dest);
			imagedestroy($src);
			unlink($fileName);//������ ��������
			return end(preg_split('|[/\\\]|', $fileName.'.'.$ext));//������ ��������� ������� � �����������
		}	}
}
