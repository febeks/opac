if(!exif_imagetype($url)){
echo "<img src='../images/book_cover.png' alt='' class='obalka'/>";
}else{
echo "<img src=$url alt='' class='obalka'/>";
}